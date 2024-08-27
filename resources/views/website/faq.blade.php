@extends('website.layouts.app')
@section('content')

<div class="container-fluid animate__animated animate__fadeInRight">
    <div class="container-fluid main_heading mt-2 mb-5">
        <div class="row text-center">
            <h1 class="pt-4 main_heading_h5">FAQ</h1>
            <p class="main_heading_p pb-4"><a href="{{ route('home') }} " style="text-decoration: none; color:#555555">Home  </a>> FAQ</p>
        </div>
    </div>
    <div class="container-fluid p-0">

       

        <!-- second section start -->
        <div class="container-fluid  pb-5">
            <div class="container pt-5">
                <div class="row pb-5">
                    <div class="col-md-8">
                        <h5 class="frequently">
                            Frequently asked questions
                        </h5>
                    </div>

                    <div class="col-md-4 mt-5">
                    <div class="searchBox">
                        <input class="searchInput"type="text" name="" placeholder="Search">
                        <button class="searchButton" href="#">
                            <i class="material-icons">
                                search
                            </i>
                        </button>
                    </div>
                    </div>
                    
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is Tiger Auto Parts warranty policy?
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Please visit our warranty page for more information. Click Here
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How do I file a warranty claim?
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Please call our office at 416-750-8578 and talk with one of our claim specialist team.
                            Please have your proof of purchase with you.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Does Tiger Auto Parts have an online order option?
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Yes. You can place your order 24/7. You can also check, edit and delete your order before submitting it.
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree2">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                            What currency are the prices?
                          </button>
                        </h2>
                        <div id="collapseThree2" class="accordion-collapse collapse" aria-labelledby="headingThree2" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            All of the prices are in Canadian dollars for Ontario customers.
                          </div>
                        </div>
                      </div>

                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree3">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                            Do the prices change time to time?
                          </button>
                        </h2>
                        <div id="collapseThree3" class="accordion-collapse collapse" aria-labelledby="headingThree3" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            Tiger Auto Parts holds the right to change prices at anytime with or without notice.
                          </div>
                        </div>
                      </div>

                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree4">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
                            What is the Tiger Auto Parts return policy?
                          </button>
                        </h2>
                        <div id="collapseThree4" class="accordion-collapse collapse" aria-labelledby="headingThree4" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            Please visit our return policy page for more information. Click Here
                          </div>
                        </div>
                      </div>

                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree5">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree5" aria-expanded="false" aria-controls="collapseThree5">
                            What payment methods do you accept?
                          </button>
                        </h2>
                        <div id="collapseThree5" class="accordion-collapse collapse" aria-labelledby="headingThree5" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            Cash, Certified check, all major Credit Cards, PayPal, Bank Transfer, Western Union.
                          </div>
                        </div>
                      </div>

                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree6">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree6" aria-expanded="false" aria-controls="collapseThree6">
                            Are there late payment penalties?
                          </button>
                        </h2>
                        <div id="collapseThree6" class="accordion-collapse collapse" aria-labelledby="headingThree6" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            Ask your sales manager or call us at 416-750-8570 for more information.
                          </div>
                        </div>
                      </div>


                  </div>
            </div>
        </div>
        <!-- second section end -->

     
    </div>
</div>


@endsection
   