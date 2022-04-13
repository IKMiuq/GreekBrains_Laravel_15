<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest as NwCreateRequest;
use App\Http\Requests\Category\CreateRequest as CtCreateRequest;
use App\Http\Requests\Source\CreateRequest;
use App\Models\Category;
use App\Models\News;
use App\Services\ParserService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use \App\Models\Source;
use Illuminate\Session\Store;
use \App\Contracts\Parser;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\throwException;

class SourceController extends Controller
{
    public function index()
    {
        return view('admin.sources.index', ['data'=> Source::all()->toArray()]);
    }

    public function create(Request $request)
    {
        return view('admin.sources.create', ['source' => Source::select('id', 'code', 'url')->get()]);
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        if (!$oldSource = Source::query()->where(['code'=>$data['code']])->first()) {
            Source::create($data);
            return back()->with('success', __('messages.admin.sources.store.success.create'));
        } else {
            $oldSource->update($data);
            return back()->with('success', __('messages.admin.sources.store.success.update'));
        }
        return back()->with('error', __('messages.admin.sources.store.fail'));
    }

    public function update($code, Parser $parser)
    {
        $source = Source::query()->where(['code' => $code])->first();
        $request = (new ParserController())->__invoke($source->url, $parser);
        if (!$source->section_id) {
            $data = ['title' => $request['title'], 'image' => $request['image'], 'description' => $request['description']];
            if (!Validator::make($data, (new CtCreateRequest)->rules())) throwException("Not validate category array");
            $id = Category::create($data);
            $source->update(['section_id' => $id->id]);
        }
        if (Validator::make($request['news'], (new NwCreateRequest)->rules())) {
            foreach ($request['news'] as $news) {
                $news['category_id'] = $source->section_id;
                if (!$oldNews = News::query()->where(['title'=>$news['title']])->first()) {
                    News::create($news);
                } else {
                    $oldNews->update($news);
                }
            }
            return back()->with('success', __('messages.admin.sources.upload.success'));
        }

        return back()->with('error', __('messages.admin.sources.upload.fail'));
    }
}
