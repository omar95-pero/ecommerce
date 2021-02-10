<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class LanguagesController extends Controller
{
    public function index()
    {
        $languages = Language::select()->paginate(PAGINATION_COUNT);
        // dd($languages);
        return view('admin.languages.index', compact('languages'));
    }
    public function create()
    {
        return view('admin.languages.create');
    }
    public function store(LanguageRequest $request)
    {
        try {
            Language::create($request->except(['_token']));
            return redirect()->route('admin.languages')->with('success', 'تم حفظ اللغة بنجاح');
        } catch (\Exception $ex) {
            return redirect()->route('admin.languages')->with('error', 'هناك خطأ يرجى المحاولة مرة أخرى');
        }
    }
    public function edit($id)
    {
        $language = Language::select()->find($id);
        if (!$language) {
            return redirect()->route('admin.languages')->with('error', 'هذه اللغة غير موجودة');
        }
        return view('admin.languages.edit', compact('language'));
    }
    public function update(LanguageRequest $request, $id)
    {
        try {
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('admin.languages.edit', $id)->with(['error' => 'هذه اللغة غير موجوده']);
            }


            if (!$request->has('active'))
                $request->request->add(['active' => 0]);

            $language->update($request->except('_token'));

            return redirect()->route('admin.languages')->with(['success' => 'تم تحديث اللغة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.languages')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function destroy($id)
    {
        try {
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('admin.languages.edit', $id)->with(['error' => 'هذه اللغة غير موجوده']);
            }




            $language->delete();

            return redirect()->route('admin.languages')->with(['success' => 'تم تحديث اللغة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.languages')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
}
