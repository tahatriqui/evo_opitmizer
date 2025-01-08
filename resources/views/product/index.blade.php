@extends('layout.navbar')

@section('url')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')

<style>

/* Media query for screens below 540px: Force 1 column */
@media (max-width: 540px) {
    .product-item {
        flex: 0 0 100%; /* Full width */
        max-width: 100%; /* Full width */
    }
    .pagination-wrapper nav {
    position: static; /* Makes the nav bar flow naturally with the page content */
    padding: 0; /* Removes any padding */
    background: none; /* Removes background styling */
    height: auto; /* Adjusts the height to content */
    z-index: 100000000

}

}

/* Media query for screens between 540px and 920px: Use 2 columns */
@media (max-width: 920px) and (min-width: 541px) {
    .product-item {
        flex: 0 0 50%; /* Half width */
        max-width: 50%; /* Half width */
    }
}

</style>


<!-- Page Image -->
<div class="sss" style="position: relative; width: 100%;">
    <img style="width: 100%; max-height: 540px; object-fit: cover; opacity: .4;"
         src="{{ asset('images/'.$categorie->img_catpro) }}"  alt="">
    <div class="textph" style="font-weight: bold; position: absolute; top: 40%;  left: {{ strlen($categorie->nom_cat) < 25 ? "37%" : (strlen($categorie->nom_cat) < 20 ? "30%" : "20%") }};
 color: #2042be; font-size: 24px; ">
        <span style="font-size: 50px;letter-spacing: 2px;">
           {{ 'PRODUITS' }}
        </span>
    </div>
</div>

<section class="container mt-4 ps-3 pe-3">
    <div class="row">
        <!-- Sidebar -->
        <div class="mb-4 col-md-3 col-12 sidebar">
            <h3 class="mb-4">
                {{ "Filter les Produits" }}
            </h3>

            <!-- Category Selection -->
            <div class="mb-3">
                <label for="category-select" class="form-label">
                    {{ "Sélectionner une catégorie" }}
                </label>
                <select class="form-select" id="category-select">
                    <option disabled>
                        {{ "Sélectionner une catégorie" }}
                    </option>
                    @forelse ($scategories as $categorie)
                        <option value="{{ $categorie->id }}">
                            {{ $categorie->name }}
                        </option>
                    @empty
                        <option disabled>
                            {{ "Aucune catégorie n'existe." }}
                        </option>
                    @endforelse
                </select>
            </div>

            <!-- Product Name Input -->
            <div class="mb-3">
                <label for="product-name" class="form-label">
                    {{ "Le nom de produit." }}
                </label>
                <input type="text" class="form-control" id="product-name" placeholder="Enter part of product">
            </div>

            <!-- Filter Link Button -->
            <a href="#" id="filter-link" class="mb-3 btn btn-primary">
                {{ "Filtrer" }}
            </a>

            <script>
                const routeTemplate = "{{ route('product.filter', ['id' => ':id', 'cid' => ':cid', 'productname' => ':productname']) }}";

                function updateFilterLink() {
                    const selectElement = document.getElementById('category-select');
                    const productName = document.getElementById('product-name').value;
                    const categoryId = selectElement.value;

                    let route = routeTemplate
                        .replace(':cid', "{{ $id }}")
                        .replace(':id', categoryId)
                        .replace(':productname', encodeURIComponent(productName));

                    document.getElementById('filter-link').href = route;
                }

                document.getElementById('category-select').addEventListener('change', updateFilterLink);
                document.getElementById('product-name').addEventListener('input', updateFilterLink);
                updateFilterLink();
            </script>

            <!-- Product Solution Section -->
            <h2 class="mt-4">
                {{ __('messages.voir') }}
            </h2>
            <h4>
                {{ __('messages.utilité') }}
            </h4>
        </div>

        <!-- Content Column -->
        <div class="col-md-9 col-12">
            <div class="flex-wrap row d-flex">
                @foreach ($filteredDetails as $item)
                    <div class="mb-4 product-item col-lg-4 col-md-6 col-sm-12" data-aos="fade-up">
                        <div class="bbb_deals cardd">
                            <div class="bbb_deals_slider_container">
                                <div class="bbb_deals_item" data-aos="zoom-in">
                                    <div class="bbb_deals_image">
                                        <img src="{{ asset('images/' . $item['product']->img_pro) }}" alt="">
                                    </div>
                                    <div class="mb-1 bbb_deals_content">
                                        <div class="flex-row bbb_deals_info_line d-flex justify-content-between">
                                            <div class="mb-5 bbb_deals_item_name" style="color: #031c77;font-size: {{
                                                strlen($item['product']->nom_pro) < 12 ? '30px' :
                                                (strlen($item['product']->nom_pro) < 20 ? '20px' :
                                                (strlen($item['product']->nom_pro) < 30 ? '16px' : '14px'))
                                            }}">

                                                <b>{{ $item['product']->nom_pro }}</b>
                                            </div>
                                        </div>
                                        @foreach ($item['details'] as $detail)
                                            <div class="bbb_deals_item_details" data-aos="fade-left">
                                                @foreach ($detail as $column => $value)
                                                    <div class="bbb_deals_item_detail">
                                                        <div class="bbb_deals_item_detail_label"
                                                            style="font-size: 15px">
                                                            {{ ucfirst(Str::limit(__('messages.' . $column), 20)) }}:
                                                        </div>
                                                        <div class="bbb_deals_item_detail_value">{{Str::limit( $value, 6) }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                        <div class="mt-2 available">
                                            <div class="flex-row available_line d-flex justify-content-between">
                                                <a href="{{ route('ProductDetail', $item['product']->id) }}" class="btn"
                                                    data-aos="flip-left">
                                                    {{ "PLUS" }}
                                                </a>
                                                <a href="{{ route('order', [$item['product']->category_id, $item['product']->nom_pro]) }}"
                                                    class="btn" data-aos="flip-right">
                                                    {{ "ORDER" }}
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
            <!-- Pagination Wrapper -->
            <div class="pagination-wrapper">
                {{ $filteredDetails->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>

<script>
    // Select the <nav> element inside .pagination-wrapper
const navElement = document.querySelector('.pagination-wrapper nav');

if (navElement) {
  // Create a new <div> element
  const divElement = document.createElement('div');

  // Copy attributes from the <nav> to the <div>
  Array.from(navElement.attributes).forEach(attr => {
    divElement.setAttribute(attr.name, attr.value);
  });

  // Copy the content of the <nav> to the <div>
  divElement.innerHTML = navElement.innerHTML;

  // Replace the <nav> with the <div>
  navElement.parentNode.replaceChild(divElement, navElement);


} 

</script>

@endsection
