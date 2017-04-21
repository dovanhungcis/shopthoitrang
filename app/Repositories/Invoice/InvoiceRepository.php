<?php
namespace App\Repositories\Invoice;

use App\Repositories\BaseRepository;
use App\Repositories\Invoice\InvoiceRepositoryInterface;
use App\Invoice;

class InvoiceRepository extends BaseRepository implements InvoiceRepositoryInterface {

    public function __construct(Invoice $invoice) {
        parent::__construct($invoice);
    }

    public function detail($id) {
        return $invoice = Invoice::findOrFail($id);
    }
}
