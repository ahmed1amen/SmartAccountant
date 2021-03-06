@extends('adminlte::page')
@section('title', 'فاتوره جديده')

@section('content_header')
    <h1>فاتورة جديده</h1>
@stop

@section('content')

    <div class="row justify-content-center animated bounceInLeft">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">المنتجات</h3>
                </div>
                <div class="card-body overflow-auto" style="max-height: 200px;">
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <label for="productselection">
                                ادخل اسم المنتج او الباركود
                            </label>
                            <select class="form-control select2-selection--single" id="productselection"></select>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>

    <div id="root">



        <div class="row animated bounceInUp">
            <div class="col-12">
                <div class="card" style="font-family: 'Cairo', sans-serif;font-weight: 900;">
                    <div class="card-header">
                        <h3 class="card-title">تفاصيل الفاتورة</h3>
                    </div>
                    <div class="card-body table-responsive p-0 ">
                        <div class="row">



                            <div class="col-sm-12">

                                <table style="direction: rtl;" id="product_table"
                                       class="table table-bordered table-hover dataTable dtr-inline calculateclass"
                                       role="grid">
                                    <thead>
                                    <tr class="text-center" role="row">
                                        <th class="text-center" tabindex="0" rowspan="1"> الكود
                                        </th>
                                        <th class="text-center" tabindex="0">
                                            اسم الصنف
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            الكميه
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            السعر
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            الاجمالي
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            اجراء
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="product_Body">

                                    <tr class='text-center' role='row'
                                        v-for="(invoice_product, k) in {!! json_encode($invoice->invoiceItems) !!}" :key="k">
                                        <td v-text="invoice_product.product_no" id='td_barcode'></td>
                                        <td v-text="invoice_product.product_name" id='td_name'></td>
                                        <td><input @change="calculateLineTotal(invoice_product)"
                                                   v-model="invoice_product.product_qty" type='number'
                                                   class='text-center text-bold' id='td_quantity' value='1' min='0'
                                                   step='1'></td>
                                        <td v-text="invoice_product.product_price" id='td_price'></td>
                                        <td v-text="invoice_product.line_total" id='td_total'></td>
                                        <td><span class='text-center text-red'></span>
                                            <i style="cursor: pointer;" class="fas fa-plus fa-trash text-red"
                                               @click="deleteRow(k, invoice_product)"></i>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row float-right  overflow-hidden">
                            <div class="table-responsive">
                                <table class="table calculateclass overflow-hidden " style="direction: rtl;">
                                    <tbody>

                                    <tr>
                                        <th>الاجمالي:</th>
                                        <td v-text="invoice_total" id="invoce_totxal"
                                            class="text-bold text-center"></td>
                                    </tr>

                                    <tr>
                                        <th>المدفوع:</th>
                                        <td class="d-flex">
                                            <input style="direction: ltr;" @change="calculateTotal"
                                                   v-model="invoice_paid" class="text-center text-bold"
                                                   id="invoce_paid" type="number" value="0"
                                                   min="0" step="1">

                                            <button @click="completedinvoice" id="complete"
                                                    class="btn btn-success btn-sm">

                                                <i class="fas fa-fw fa-check-circle"></i>

                                            </button>


                                        </td>
                                    </tr>


                                    <tr>
                                        <th>المتبقي:</th>
                                        <td v-text="invoice_rest" id="invoce_Rest" class="text-bold text-center">0</td>

                                        {!! Form::label('PaymentTypeID', __('Models/Invoice.PaymentTypeID')) !!}
                                        {!! Form::select('PaymentTypeID',$payment_types, null,['class' => 'form-control' , 'v-model'=>"Payment_Type"]) !!}


                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>


        <div class="row text-center animated bounceInDown ">
            <div class="col-md-12" style="font-family: 'Cairo SemiBold',serif;">

                <button @click="resetdata" id="cleardata" class="btn btn-danger btn-sm  float-left"
                        style="font-family: cairo, serif; font-weight: 700;">
                    <i class="fas fa-fw fa-trash"></i>
                    تفريغ

                </button>

                <button @click="storebill" id="btnFetch" class="btn btn-warning btn-lg"
                        style="font-family: cairo, serif; font-weight: 700;">

                    <i class="fas fa-fw fa-print"></i>
                    حفظ وطباعة
                </button>


            </div>
        </div>


    </div>

@stop
@section('css')

@stop

@section('customejs')
    <script>
        var _token = "{{ csrf_token() }}";
        $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $('#productselection').select2({
            theme: "bootstrap",
            width: null,
            containerCssClass: ':all:',
            cache: true,
            ajax: {
                placeholder: 'Search for a Products',
                url: '{{route('product.LiveSearch')}}',
                dataType: 'json',

                data: function (params) {
                    var query = {
                        q: params.term,
                    };
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.results,
                    };
                },
            },
            templateResult: formatRepo,
            minimumInputLength: 1,
        });
        function formatRepo(product) {
            if (product.loading) {
                return product.name;
            }
            var $container = $(
                "<div class='select2-result-Product clearfix'>" + "<i class='float-right fas fa-plus text-green'></i>" +
                "<div class='select2-result-Product__name'></div>" +
                "<div class='select2-result-Product__barcode'></div>" +
                "</div>"
            );
            $container.find(".select2-result-Product__name").text('Name : ' + product.Name);
            $container.find(".select2-result-Product__barcode").text('Barcode : ' + product.Barcode);
            return $container;
        }

        $("#productselection").on('select2:select', function (selection) {
            document.getElementById('root').__vue__.invoice_products.push({
                product_no: selection.params.data.id,
                product_name: selection.params.data.Name,
                product_price: selection.params.data.SellingPrice,
                product_qty: 1,
                line_total:selection.params.data.SellingPrice,
            });


            calcluaterows();

        });
        $(".calculateclass").on('change', 'input', function () {
            calcluaterows();
        });

    </script>


    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
        var _token = "{{ csrf_token() }}";
        var app = new Vue({
            el: '#root',
            data: {

                Payment_Type: 'CASH',
                cutomer_paid: 0,
                cutomer_rest: 0,
                invoice_total: 0,
                invoice_paid: 0,
                invoice_rest: 0,
                deliverday: 1,
                deliverdate:'',
                invoice_products: null,
                products:[],
                {{--products:@json($products)--}}
            },
            methods: {
                datacalc(){
                    var date = new Date();

                    date.setDate(date.getDate() + parseInt( this.deliverday));

                    this.deliverdate=date.toLocaleDateString();
                },
                completedinvoice(){


                    this.invoice_paid = this.invoice_total
                },
                resetdata() {
                    this.invoice_products = [];
                    this.invoice_paid = 0;
                    this.calculateTotal();
                    this.deliverday = 1;
                },

                storebill() {
                    if (this.invoice_products.length == null) {
                        swal.fire("خطأ!",
                            "<b>تأكد من ادخال</b>" +
                            "<ul style='direction: rtl; font-weight: 800; '>" +
                            "<li>اسم العميل</li>" +
                            "<li>اصناف الفاتورة</li>" +
                            "</ul>"
                            ,
                            "error");
                    } else {


                        let $this = $("#btnFetch");
                        // $this.button('loading');
                        $this.prop("disabled", true);
                        $this.data('original-text', $this.html());
                        $this.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);


                        $.ajax({
                            type: "put",
                            url: "{{route('admin.sale_invoice.update')}}",
                            dataType: 'json',
                            'contentType': 'application/json',

                            data:
                                JSON.stringify({
                                    'total': this.invoice_total,
                                    'payment_type': this.Payment_Type,
                                    'paid': this.invoice_paid,
                                    'reset': this.invoice_rest,
                                    'deliverday':this.deliverday,
                                    'billitems': this.invoice_products,
                                    '_token': _token
                                }),

                        })
                            .done(data => {
                                swal.fire("Invoice", "Invoice successfully Created!", "success");
                                let $this = $("#btnFetch");
                                $this.prop("disabled", false);
                                $this.html($this.data('original-text'));
                                this.resetdata();
                                $("#printf").attr("src", "invoice/print/" + data.invoice_id);

                            })
                            .fail(function (data) {
                                swal.fire("Invoice !", "Make Sure From Your Data", "error");
                                let $this = $("#btnFetch");
                                $this.prop("disabled", false);
                                $this.html($this.data('original-text'));
                            });


                    }


                },
                calchelper() {


                    this.cutomer_rest = this.cutomer_paid - this.invoice_total
                },


                addNewRow(ele) {
                    var product = this.products.filter((item) => {
                        return item.id === parseInt(ele.currentTarget.getAttribute('id'))
                    });
                    if ((this.invoice_products.filter(d => d.product_no === product[0].id).length) != 0) {
                        var ar2 = this.invoice_products.filter(d => d.product_no === product[0].id).slice();
                        ar2[0].product_qty += 1;
                        ar2[0].line_total = (ar2[0].product_qty * ar2[0].product_price);
                    } else {

                        this.invoice_products.push({
                            product_no: product[0]['id'],
                            product_name: product[0]['Name'],
                            product_price: product[0]['price'],
                            product_qty: 1,
                            line_total: product[0]['price'],
                        });
                    }
                    this.calculateTotal();

                },
                deleteRow(index, invoice_product) {
                    var idx = this.invoice_products.indexOf(invoice_product);
                    console.log(idx, index);
                    if (idx > -1) {
                        this.invoice_products.splice(idx, 1);
                    }
                    this.calculateTotal();
                },
                calculateLineTotal(invoice_product) {
                    var total = parseFloat(invoice_product.product_price) * parseFloat(invoice_product.product_qty);
                    if (!isNaN(total)) {
                        invoice_product.line_total = total;
                    }
                    this.calculateTotal();

                },
                calculateTotal() {
                    var total;
                    total = this.invoice_products.reduce(function (sum, product) {
                        var lineTotal = parseFloat(product.line_total);
                        if (!isNaN(lineTotal)) {
                            return sum + lineTotal;
                        }
                    }, 0);

                    total = parseFloat(total);
                    if (!isNaN(total)) {


                        this.invoice_total = total;
                        this.invoice_rest = (this.invoice_total - this.invoice_paid);

                    } else {
                        this.invoice_total = '0.00'
                    }
                },


            }
        })
    </script>







@stop

@section('adminlte_css')
    <link rel="stylesheet" href="{{asset('css/xselect2-bootstrap.min.css')}}">

@endsection

