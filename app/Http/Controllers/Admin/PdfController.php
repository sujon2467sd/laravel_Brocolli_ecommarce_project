<?php

namespace App\Http\Controllers\Admin;



use App\Models\logo;
use App\Models\OrderItem;
use App\Models\OrderTable;
use Illuminate\Http\Request;
use App\Models\TopMenuSetting;
use App\Models\ShippingAddress;
use App\Http\Controllers\Controller;
use PDF;
use Mpdf\Mpdf;

class PdfController extends Controller
{
    public function invoice_pdf($id){
         $order= OrderTable::findOrFail($id);

         $logos=logo::latest()->first();
         $shipping = ShippingAddress::where('order_id',$id)->first();
        //  $order = OrderTable::where('id',$id)->first();
        $settings= TopMenuSetting::first();
        $iteams= OrderItem::with('product')->where('order_id',$id)->get();

         $data = [
                'order'=>$order,
                'logo'=> $logos,
                'shipping'=>$shipping,
                'settings'=>$settings,
                'items'=> $iteams,

        ];

        $pdf = PDF::loadView('admin.order.invoice_pdf', $data);

        return $pdf->download('invoice.pdf');
    }


    public function download_pdf_bulk(Request $request){
        $orderIds = $request->input('order_ids');

        // Initialize an array to store PDFs
        $pdfs = [];

        // Loop through each selected order ID
        foreach ($orderIds as $orderId) {
            // Fetch the order details
            $order = OrderTable::findOrFail($orderId);
            $logos = Logo::latest()->first();
            $shipping = ShippingAddress::where('order_id', $orderId)->first();
            $settings = TopMenuSetting::first();
            $items = OrderItem::with('product')->where('order_id', $orderId)->get();

            // Generate PDF for the order
            $data = [
                'order' => $order,
                'logo' => $logos,
                'shipping' => $shipping,
                'settings' => $settings,
                'items' => $items,
            ];
            $pdf = PDF::loadView('admin.order.invoice_pdf', $data);

            // Add the PDF to the array
            $pdfs[] = $pdf;
        }

        // Combine multiple PDFs into a single PDF
        $combinedPdf = new \Mpdf\Mpdf();

        foreach ($pdfs as $pdf) {
            $combinedPdf->AddPage();
            $combinedPdf->WriteHTML($pdf->output());
        }

        // Download the combined PDF
        return $combinedPdf->download('invoices.pdf');
    }

}