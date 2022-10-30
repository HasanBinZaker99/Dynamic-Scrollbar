@extends('CRM.layouts_successLeeds.leedsNav')
@section('leedContent')
<div class="content-wrapper mx-auto">
{{--    <div class="col-md-5 alert alert-success alert-dismissible" >--}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
{{--        <h5><i class="icon fas fa-check"></i> Alert!</h5>--}}
{{--        Success alert preview. This alert is dismissable.--}}
{{--    </div>--}}
    <section class="pb-5 pt-0">
        <div class="mx-3 px-5">
            <div class="row p-0">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Add Cart</div>
                        <div class="card-body">
                            <h4 class="text-success">{{ Session::get('message') }}</h4>
                                <create-cart></create-cart>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
<script>
    import CreateCart from "../../../js/components/CreateCart";
    export default {
        components: {CreateCart}
    }
</script>
