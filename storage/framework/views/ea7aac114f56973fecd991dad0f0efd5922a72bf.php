
<?php $__env->startSection('title', 'الخزنة'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1><i class="fas fa-money-bill-wave"></i> <?php echo e(__('General.Titles.Safe')); ?> </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="root">
            <div class="row justify-content-center animated slideInDown ">
            <div class="card card-primary col-8 overflow-hidden">
                <div class="card-body p-0" style="padding: 0 !important;">
                    <div class="row" style="border-bottom: 5px solid #5b75b5;">

                        <div class="form-group col-12 p-3">
                            <?php echo Form::label('MarketplaceID', __('Models/Marketplace.Name')); ?>

                            <select class="form-control" @change="GetInvoices()" name="" v-model="selected" id="">
                                <option value="">اختر</option>
                                <option v-for="(market,k) in markets" :value="k">{{ market }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>







        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row">
                    <div class="col-12 p-3">
                        <div class="card">
                            <div class="card-header main-bg-blu-color">
                                <h4 class="mb-0 text-white text-center" >اخر الحركات المالية  مباشر </h4>
                            </div>
                            <div class="">
                                <table style="direction: rtl;" id="product_table"
                                       class="table mb-0 table-bordered  table-striped table-hover dataTable dtr-inline calculateclass"
                                       role="grid">
                                    <thead>
                                    <tr class="text-center" role="row">
                                        <th class="text-center" tabindex="0">
                                            الصندوق
                                        </th>
                                        <th class="text-center" tabindex="0">
                                            رقم الحساب
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            اجمالي الفاتورة
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            المدفوع
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            قيمة الضريبة
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            الباقي
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody id="product_Body">

                                    <tr class='text-center' role='row'>
                                        <td>دفع نقدي</td>
                                        <template v-if="last_invoice != null && last_invoice[0] != null">
                                            <td>{{ last_invoice[0].AccountNumber }}</td>
                                            <td>{{ last_invoice[0].Total }}</td>
                                            <td>{{ last_invoice[0].Paid }}</td>
                                            <td>{{ last_invoice[0].Paid / 100 *  VAT}}</td>
                                            <td>{{ last_invoice[0].Rest }}</td>
                                        </template>
                                    </tr>
                                    <tr class='text-center' role='row'>
                                        <td>نقاط بيع</td>
                                        <template v-if="last_invoice != null && last_invoice[2] != null">
                                            <td>{{ last_invoice[2].AccountNumber }}</td>
                                            <td>{{ last_invoice[2].Total }}</td>
                                            <td>{{ last_invoice[2].Paid }}</td>
                                            <td>{{ last_invoice[2].Paid / 100 *  VAT}}</td>
                                            <td>{{ last_invoice[2].Rest }}</td>
                                        </template>
                                    </tr>
                                    <tr class='text-center' role='row'>
                                        <td>تحويل بنكي</td>
                                        <template v-if="last_invoice != null && last_invoice[1] != null">
                                            <td>{{ last_invoice[1].AccountNumber }}</td>
                                            <td>{{ last_invoice[1].Total }}</td>
                                            <td>{{ last_invoice[1].Paid }}</td>
                                            <td>{{ last_invoice[1].Paid / 100 *  VAT}}</td>
                                            <td>{{ last_invoice[1].Rest }}</td>
                                        </template>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-3">
                        <div class="card">
                            <div class="card-header main-bg-blu-color">
                                <h4 class="mb-0 text-white text-center">  اخر الحركات المالية <small style="font-size: 70%;"> ( الحركه الماليه الماضيه يتم تحديثها بتوقيت ١٢ مساءًً )</small></h4>
                            </div>
                            <div class="">
                                <table style="direction: rtl;" id="product_table"
                                       class="table mb-0 table-bordered  table-striped table-hover dataTable dtr-inline calculateclass"
                                       role="grid">
                                    <thead>
                                    <tr class="text-center" role="row">
                                        <th class="text-center" tabindex="0">
                                            الصندوق
                                        </th>
                                        <th class="text-center" tabindex="0">
                                            رقم الحساب
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            اجمالي الفاتورة
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            المدفوع
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            قيمة الضريبة
                                        </th>
                                        <th class="text-center" tabindex="0" rowspan="1">
                                            الباقي
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody id="product_Body">

                                    <tr class='text-center' role='row'>
                                        <td>دفع نقدي</td>
                                        <template v-if="last_invoice_day != null && last_invoice_day[0] != null">
                                            <td>{{ last_invoice_day[0].AccountNumber }}</td>
                                            <td>{{ last_invoice_day[0].Total }}</td>
                                            <td>{{ last_invoice_day[0].Paid }}</td>
                                            <td>{{ last_invoice_day[0].Paid / 100 *  VAT}}</td>
                                            <td>{{ last_invoice_day[0].Rest }}</td>
                                        </template>
                                    </tr>
                                    <tr class='text-center' role='row'>
                                        <td>نقاط بيع</td>
                                        <template v-if="last_invoice_day != null && last_invoice_day[2] != null">
                                            <td>{{ last_invoice_day[2].AccountNumber }}</td>
                                            <td>{{ last_invoice_day[2].Total }}</td>
                                            <td>{{ last_invoice_day[2].Paid }}</td>
                                            <td>{{ last_invoice_day[2].Paid / 100 *  VAT}}</td>
                                            <td>{{ last_invoice_day[2].Rest }}</td>
                                        </template>
                                    </tr>
                                    <tr class='text-center' role='row'>
                                        <td>تحويل بنكي</td>
                                        <template v-if="last_invoice_day != null && last_invoice_day[1] != null">
                                            <td>{{ last_invoice_day[1].AccountNumber }}</td>
                                            <td>{{ last_invoice_day[1].Total }}</td>
                                            <td>{{ last_invoice_day[1].Paid }}</td>
                                            <td>{{ last_invoice_day[1].Paid / 100 *  VAT}}</td>
                                            <td>{{ last_invoice_day[1].Rest }}</td>
                                        </template>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('customejs'); ?>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        var _token = "<?php echo e(csrf_token()); ?>";

        var app = new Vue({
            el: '#root',
            data: {
                
                keyword: '',
                start_date:'2000-10-20',
                end_date:'2100-10-31',
                selected:'',
                markets:[],
                invoices:[],
                int:null,
                VAT: parseInt("<?php echo e(auth()->user()->settings->VAT); ?>"),
                last_invoice:null,
                last_invoice_day:null,
            },
            methods: {
                GetAllMarketPlaces(){
                    axios.get("<?php echo e(route('getAllMarkets')); ?>").then((data)=>{
                        this.markets = data.data;


                    });
                },
                GetInvoices(){
                    data ={
                        'from'  :   this.start_date,
                        'to'    :   this.end_date,
                        'ID'    :   this.selected,
                    };
                    axios.post('<?php echo e(route('getInvoices')); ?>',data).then((data)=>{
                        this.invoices = data.data.data;
                        this.GetLastInvoice();
                        this.GetLastInvoiceNow();
                    })
                },
                GetLastInvoiceNow(){
                    this.int = setInterval(()=>{
                        axios.post('<?php echo e(route('LastInvoiceNow')); ?>',{'ID':this.selected}).then((data)=>{
                            this.last_invoice = data.data.data;
                        });
                    },60000);
                },
                GetLastInvoice(){
                    data ={
                        'from'  :   this.start_date,
                        'to'    :   this.end_date,
                        'ID'    :   this.selected,
                    };
                    axios.post('<?php echo e(route('LastInvoice')); ?>',data).then((data)=>{
                        this.last_invoice_day = data.data.data;
                    });
                }

                
                
                
                
                
                
                
                
                
                
                
                
                
                



                
                
                
                
                

                
                
                
                
                

                
                
                
                
                
                
                
                

                
                
                

                









                
                

                
                
                
                
                
                
                

                
                
                

                
                


                


                
                
                


                


                

            },
            created(){
                this.GetAllMarketPlaces();
            }


        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel-Projects\Smart Accountant\resources\views/admin/Safe/index.blade.php ENDPATH**/ ?>