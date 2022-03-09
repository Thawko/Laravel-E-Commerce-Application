<!--category section start -->
<div class="container">
    <div class="category_section">
        <div class="row">
            <div class="col-lg-12 col-sm-12 main">
                @foreach ($data['categories'] as $category)
                    <div class="col">
                        <div class="box_main">
                            <div class="icon_1"></div>
                            <h4 class="fashion_text active">{{ $category->title }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="category_section_2">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="beds_section active">
                    <h1 class="bed_text">Up to 50% off | Beds</h1>
                    <div><img src="{{ asset('assets') }}/site/images/img-2.png" class="image_2"></div>
                    <div class="seemore_bt"><a href="#">see More</a></div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="beds_section">
                    <h1 class="bed_text">organized in style</h1>
                    <div><img src="{{ asset('assets') }}/site/images/img-3.png" class="image_2"></div>
                    <div class="seemore_bt"><a href="#">see More</a></div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="beds_section">
                    <h1 class="bed_text">Refurbished mixer</h1>
                    <div><img src="{{ asset('assets') }}/site/images/img-4.png" class="image_2"></div>
                    <div class="seemore_bt"><a href="#">see More</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- category section end -->
