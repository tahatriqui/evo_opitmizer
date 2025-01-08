@extends('layout.navbar')
@section('url')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')
<style>
@media (max-width: 768px) {
.sss{
    display:none
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
    <section class="container mt-4">
        <div class="row">
            <!-- Sidebar -->
               <div class="mb-4 col-md-3 col-12 sidebar">
    <h3 class="mb-4">
        {{__('messages.f_l_p')  }}
    </h3>

    <!-- Category Selection -->
    <div class="mb-3">
        <label for="category-select" class="form-label">
            {{"Sélectionner une catégorie",  }}
        </label>
        <select class="form-select" id="category-select">
            <option disabled>
                {{"Sélectionner une catégorie",  }}
            </option>

            @forelse ($scategories as $categorie)
                 @if($categorie->id == $cid)
                <option value="{{ $categorie->id }}" selected>
                    {{$categorie->name,  }}
                </option>
                @else
                <option value="{{ $categorie->id }}" >
                    {{$categorie->name,  }}
                </option>
                @endif
            @empty
                <option disabled>
                    {{"Aucune catégorie n'existe.",  }}
                </option>
            @endforelse
        </select>
    </div>

    <!-- Product Name Input -->
    <div class="mb-3">
        <label for="product-name" class="form-label">
            {{"le nom de produit.",  }}
        </label>
        <input type="text" class="form-control" id="product-name" placeholder="Enter part of product">
    </div>

    <!-- Filter Link Button -->
    <a href="#" id="filter-link" class="mb-3 btn btn-primary">
        {{"filtre",  }}
    </a>

    <script>
        // Store the route template with placeholders in JavaScript
        const routeTemplate = "{{ route('product.filter', ['id' => ':id','cid' => ':cid', 'productname' => ':productname']) }}";

        function updateFilterLink() {
            const selectElement = document.getElementById('category-select');
            const productName = document.getElementById('product-name').value;
            const categoryId = selectElement.value;

            // Replace the placeholders with actual values
            let route = routeTemplate
                .replace(':cid',"{{ $id }}")  // Replace placeholder for category ID
                .replace(':id', categoryId )  // Pass server-side $id into JavaScript
                .replace(':productname', encodeURIComponent(productName)); // URL encode product name

            // Update the filter link's href
            document.getElementById('filter-link').href = route;
        }

        // Add event listeners to dynamically update the filter link
        document.getElementById('category-select').addEventListener('change', updateFilterLink);
        document.getElementById('product-name').addEventListener('input', updateFilterLink);

        // Initialize the filter link in case the page loads with pre-selected values
        updateFilterLink();
    </script>

    <!-- Product Solution Section -->
     <h2 class="mt-4">
            {{__('messages.voir') }}
    </h2>
    <h4>
            {{__('messages.utilité') }}
    </h4>
</div>

            <!-- Content Column -->
            <div class="col-md-9 col-12">
                  <div class="row">
                @foreach ($filteredDetailsPaginator as $item)
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
                                                        <div class="bbb_deals_item_detail_label" style="font-size: 15px">  {{Str::limit(ucfirst(__('messages.'. $column)),20)  }}:</div>
                                                        <div class="bbb_deals_item_detail_value">{{  Str::limit($value, 6)}}</div>
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
                 <!-- Pagination Wrapper -->
<div class="pagination-wrapper">
    {{ $filteredDetailsPaginator->links('pagination::bootstrap-5') }}
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

  console.log('<nav> has been replaced with <div>!');
} else {
  console.log('No <nav> found inside .pagination-wrapper');
}

</script>


@endsection
