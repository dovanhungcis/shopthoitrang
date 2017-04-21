<?php
namespace App\Http\Controllers;

use App\Repositories\Invoice\InvoiceRepository;

class InvoiceController extends Controller {

    public function __construct(InvoiceRepository $invoice) {
        $this->invoice = $invoice;
    }

    public function index() {
        $list = $this->invoice->list_with_paging();
        $listArr = $list->toArray();
        $currentPage = $listArr['current_page'];
        $perPage = $listArr['per_page'];
        $total = $listArr['total'];
        $thisPage = ($currentPage - 1) * $perPage + 1;
        $thisPageEnd = $currentPage * $perPage;
        if ($thisPageEnd >= $total)
            $thisPageEnd = $total;

        return view('admin.invoice.show', compact('list', 'thisPage', 'thisPageEnd', 'total'));
    }

    public function show($id) {
        $invoice = $this->invoice->detail($id);

        return view('admin.invoice.detail', compact('invoice'));
    }

    public function acceptorder($id) {
        $invoice = $this->invoice->detail($id);
        // dd($invoice->invoice_product);
        $invoice->status = 1;
        $invoice->save();
        foreach ($invoice->invoice_product as $key => $product) {
            $product->Product->quantity -= $product->quantity;
            $product->Product->save();
            $product->Product->Product->sold += $product->quantity ;
            $product->Product->Product->save();
        }

        return redirect()->route('admin@invoice@invoice')->with('success', 'cập nhật trạng thái thành công.');
    }
}
