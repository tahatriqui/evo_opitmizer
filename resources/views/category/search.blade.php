@extends('layout.navbar')
<style>
@media (max-width: 768px) {
.sss{
    display:none
}

</style>
@section('content')
    <!-- Page Image -->
        <div class="sss" style="position: relative; width: 100%;">
        <img style="width: 100%; max-height: 400px; object-fit: cover; opacity: .4;" src="{{ asset('images/Original.png') }}"
            loading="lazy" alt="">
        <div
            style="font-weight: bold; position: absolute; top: 20%; left:40%;  color: #2042be; font-size: 24px; padding: 10px;">
            <span style="font-size: 50px;">{{__('messages.Produits') }}</span>
        </div>
    </div>

    <div class="container">
        @if ($products->isEmpty())
            <p>{{'Aucun produit trouvé.',  }}</p>
        @else
            <div class="col-md-9 col-12">
               <div class="row">
                @foreach ($filteredDetails as $item)
                    <div class="mb-4 col-md-4 col-12" data-aos="fade-up">
                        <div class="bbb_deals">
                            <div class="bbb_deals_slider_container">
                                <div class="bbb_deals_item" data-aos="zoom-in">
                                    <div class="bbb_deals_image">
                                        <img src="{{ asset('images/' . $item['product']->img_pro) }}" alt="">
                                    </div>
                                    <div class="mb-1 bbb_deals_content">
                                        <div class="flex-row bbb_deals_info_line d-flex justify-content-between">
                                            <div class="mb-5 bbb_deals_item_name" style="color: #031c77"><b>{{ $item['product']->nom_pro }}</b></div>
                                        </div>
                                        @foreach ($item['details'] as $detail)
                                            <div class="bbb_deals_item_details" data-aos="fade-left">
                                                @foreach ($detail as $column => $value)
                                                    <div class="bbb_deals_item_detail">
                                                        <div class="bbb_deals_item_detail_label" style="font-size: 15px">{{ ucfirst($column) }}:</div>
                                                        <div class="bbb_deals_item_detail_value">{{ $value }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                        <div class="mt-2 available">
                                            <div class="flex-row available_line d-flex justify-content-between">
                                                <a href="{{ route('ProductDetail', $item['product']->id) }}" class="btn" data-aos="flip-left">
                                                    {{"PLUS" }}
                                                </a>
                                                <a href="{{ route('order', [$item['product']->category_id, $item['product']->nom_pro]) }}" class="btn" data-aos="flip-right">
                                                    {{"ORDER" }}
                                                </a>
                                            </div>
                                            <div class="available_bar"><span style="width:17%"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
