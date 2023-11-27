<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;
class NhaCungCapController extends Controller
{
   public function View()
   {
    $nha_Cung_Cap=NhaCungCap::all();
    return view('NHACUNGCAP/danh-sach',compact('nha_Cung_Cap'));
   } 
   public function themMoi()
   {
      return view('NHACUNGCAP/them');
   }
   public function xuLyThemMoi(Request $request)
   {
      $nha_Cung_Cap= new NhaCungCap();

      $nha_Cung_Cap->ten=$request->ten;
      $nha_Cung_Cap->dia_chi=$request->dia_chi;
      $nha_Cung_Cap->email=$request->email;

      $nha_Cung_Cap->save();
      return redirect()->route("nha-cung-cap.danh-sach");
   }
   public function Delete($id)
   {
      $nha_Cung_Cap=NhaCungCap::find($id);
      if(empty($nha_Cung_Cap))
      {
         return redirect()->route("nha-cung-cap.danh-sach");
      }
      $nha_Cung_Cap->delete();
      return redirect()->route("nha-cung-cap.danh-sach");
   }
   public function Edit($id)
   {
      $nha_Cung_Cap=NhaCungCap::find($id);
      if(empty($nha_Cung_Cap))
      {
         return redirect()->route("nha-cung-cap.danh-sach");
      }
      return view("nha-cung-cap.cap-nhat", compact("nha_Cung_Cap"));
   }
   public function xlEdit(Request $request, $id)
   {
      $nha_Cung_Cap=NhaCungCap::find($id);
      
      $nha_Cung_Cap->ten=$request->ten;
      $nha_Cung_Cap->dia_chi=$request->dia_chi;
      $nha_Cung_Cap->email=$request->email;
      $nha_Cung_Cap->save();
      return redirect()->route("nha-cung-cap.danh-sach");
   }
}
