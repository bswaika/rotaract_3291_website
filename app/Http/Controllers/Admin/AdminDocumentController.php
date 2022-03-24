<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Document as Document;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminDocumentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function listdocument(){
        $documents = Document::orderBy('created_at', 'DESC')->get();

        return view('functionalities.documents.listdocuments', ["documents"=>$documents]);
    }

    public function storedocument(Request $request){
        if($request->hasFile('document')){
            $filename = pathinfo($request->file('document')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('document')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('document')->storeAs('public/documents', $fileNameToStore);

            $document = new Document;
            $document->title = $request->input('title');
            $document->document = $fileNameToStore;

            $document->save();
        }
        return redirect('/admin/documents')->with('success', 'Document Added');
    }

    public function destroydocument(Request $request, $id){
        $document = Document::find($id);

        Storage::delete('public/documents/'.$document->document);

        $document->delete();
        return redirect('/admin/documents')->with('delete_success', 'Document Deleted');
    }
}
