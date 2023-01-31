@extends('main')
@section('container')
<section class="p-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card mb-3" style="border:0">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="img/kampus3.jpg" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Kampus.com</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore quasi beatae accusantium perspiciatis hic consectetur delectus temporibus aspernatur numquam modi, voluptate alias vitae est ipsa, praesentium unde sit molestias quaerat!</p>
                          <a href="/about" class="btn btn-success">About Us</a>
                        </div>
                      </div>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 18rem;">
                        <img src="img/berita1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Berita Pertama</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Read more</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 18rem;">
                        <img src="img/berita2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Berita Kedua</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Read more</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 18rem;">
                        <img src="img/mobil1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Berita Ketiga</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Read more</a>
                        </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>
@endsection

