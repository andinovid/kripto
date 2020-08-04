<div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">
    <div class="container-fluid page__container">
        <div class="card">
            <div class="card-header card-header-large bg-white">
                <h1 class="card-header__title">Selamat Datang!</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php $top_courses = $this->crud_model->get_top_courses()->result_array();
                    $cart_items = $this->session->userdata('cart_items');
                    foreach ($top_courses as $top_course) : ?>
                        <div class="col-md-3">
                            <div class="card card__course">
                                <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                                    <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>">
                                        <span><img src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" class="mb-1" style="width:34px;" alt="logo"></span>
                                        <span class="course__title"><?php echo $top_course['title']; ?></span>
                                    </a>
                                </div>
                                <div class="p-3">
                                    <div class="mb-2">
                                        <p><?php echo $top_course['short_description']; ?></p>
                                        <span class="mr-2">
                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_half</i></a>
                                        </span>
                                        <strong>4.7</strong><br />
                                        <small class="text-muted">(391 ratings)</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <strong class="h4 m-0">$49</strong>
                                        <button onclick="handleCartItems(this)" class="btn btn-primary ml-auto"><i class="material-icons">add_shopping_cart</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>


                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid page__container">
        <div class="tab-content">
            <div class="tab-pane active show fade" id="activity_all">
                <!-- FIRST TAB CONTENT -->
                <div class="row card-group-row">
                    <div class="col-lg-4 col-md-6 card-group-row__col">
                        <div class="card card-group-row__card">
                            <div class="card-body-x-lg card-body d-flex flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2 d-flex">Kelas Business</div>
                                    <span class="h4 m-0">750 Kelas </span>
                                </div>
                                <div><i class="material-icons icon-muted icon-40pt ml-3">gps_fixed</i></div>
                            </div>
                            <div class="progress" style="height: 3px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 card-group-row__col">
                        <div class="card card-group-row__card">
                            <div class="card-body-x-lg card-body d-flex flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted d-flex mb-2">Kelas Development</div>
                                    <span class="h4 m-0">320 Kelas</span>
                                </div>
                                <div><i class="material-icons icon-muted icon-40pt ml-3">gps_fixed</i></div>
                            </div>
                            <div class="progress" style="height: 3px;">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 card-group-row__col">
                        <div class="card card-group-row__card">
                            <div class="card-body-x-lg card-body d-flex flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted d-flex mb-2">Kelas Marketing</div>
                                    <span class="h4 m-0">620 Kelas</span>
                                </div>
                                <div><i class="material-icons icon-muted icon-40pt ml-3">gps_fixed</i></div>
                            </div>
                            <div class="progress" style="height: 3px;">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-header-large bg-light d-flex align-items-center">
                                <div class="flex">
                                    <h4 class="card-header__title">Kelas Gratis</h4>
                                    <div class="card-subtitle text-muted">Daftar kelas gratis</div>
                                </div>
                                <div class="ml-auto">
                                    <a href="author-earnings.html" class="btn btn-light">Browse All</a>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="chart" style="height: 295px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card card__course">
                                                <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                                                    <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="#">
                                                        <span><img src="assets/images/logos/react.svg" class="mb-1" style="width:34px;" alt="logo"></span>
                                                        <span class="course__title">React</span>
                                                        <span class="course__subtitle">Learn the Basics</span>
                                                    </a>
                                                </div>
                                                <div class="p-3">
                                                    <div class="mb-2">
                                                        <span class="mr-2">
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_half</i></a>
                                                        </span>
                                                        <strong>4.7</strong><br />
                                                        <small class="text-muted">(391 ratings)</small>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <strong class="h4 m-0">Gratis</strong>
                                                        <a href="#" class="btn btn-primary ml-auto"><i class="material-icons">add_shopping_cart</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card card__course">
                                                <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                                                    <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="#">
                                                        <span><img src="assets/images/logos/vuejs.svg" class="mb-1" style="width:34px;" alt="logo"></span>
                                                        <span class="course__title">Vue.js</span>
                                                        <span class="course__subtitle">Quick Tips</span>
                                                    </a>
                                                </div>
                                                <div class="p-3">
                                                    <div class="mb-2">
                                                        <span class="mr-2">
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_half</i></a>
                                                        </span>
                                                        <strong>4.7</strong><br />
                                                        <small class="text-muted">(391 ratings)</small>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <strong class="h4 m-0">Gratis</strong>
                                                        <a href="#" class="btn btn-primary ml-auto"><i class="material-icons">add_shopping_cart</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card card__course">
                                                <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                                                    <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="#">
                                                        <span><img src="assets/images/logos/angular.svg" class="mb-1" style="width:34px;" alt="logo"></span>
                                                        <span class="course__title">Angular</span>
                                                        <span class="course__subtitle">Back to Basics</span>
                                                    </a>
                                                </div>
                                                <div class="p-3">
                                                    <div class="mb-2">
                                                        <span class="mr-2">
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_half</i></a>
                                                        </span>
                                                        <strong>4.7</strong><br />
                                                        <small class="text-muted">(391 ratings)</small>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <strong class="h4 m-0">Gratis</strong>
                                                        <a href="#" class="btn btn-primary ml-auto"><i class="material-icons">add_shopping_cart</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="card">
                            <div class="card-header card-header-large bg-light d-flex align-items-center">
                                <div class="flex">
                                    <h4 class="card-header__title">Rankings</h4>
                                    <div class="card-subtitle text-muted">Current Month Earnings</div>
                                </div>

                                <div class="dropdown ml-auto">
                                    <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Go to Report</a>
                                        <a class="dropdown-item" href="#">Other Statistics</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">Archive</a>
                                    </div>
                                </div>

                            </div>


                            <ul class="list-group list-rankings">

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <span class="mr-2">1.</span>
                                        <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" class="img-fluid rounded-circle mr-2" width="30" alt="...">
                                        <div class="media-body">
                                            <a href="#">Tara Knows</a>
                                        </div>
                                        <div>&dollar;29,021</div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <span class="mr-2">2.</span>
                                        <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" class="img-fluid rounded-circle mr-2" width="30" alt="...">
                                        <div class="media-body">
                                            <a href="#">Karen Smith</a>
                                        </div>
                                        <div>&dollar;25,250</div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <span class="mr-2">3.</span>
                                        <img src="assets/images/256_michael-dam-258165-unsplash.jpg" class="img-fluid rounded-circle mr-2" width="30" alt="...">
                                        <div class="media-body">
                                            <a href="#">Mark Ups</a>
                                        </div>
                                        <div>&dollar;21,330</div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <span class="mr-2">4.</span>
                                        <img src="assets/images/256_s-a-r-a-h-s-h-a-r-p-764291-unsplash.jpg" class="img-fluid rounded-circle mr-2" width="30" alt="...">
                                        <div class="media-body">
                                            <a href="#">Steven Short</a>
                                        </div>
                                        <div>&dollar;17,740</div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <span class="mr-2">5.</span>
                                        <img src="assets/images/256_luke-porter-261779-unsplash.jpg" class="img-fluid rounded-circle mr-2" width="30" alt="...">
                                        <div class="media-body">
                                            <a href="#">John Mix</a>
                                        </div>
                                        <div>&dollar;13,120</div>
                                    </div>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
                <!-- END FIRST TAB CONTENT -->
            </div>
            <div class="tab-pane fade" id="activity_emails">
                Ducimus aperiam aut corporis, facere nobis id quos dignissimos, ut corrupti asperiores reprehenderit culpa praesentium exercitationem, officia commodi.
            </div>
            <div class="tab-pane fade" id="activity_quotes">
                Odit consectetur dolore maxime similique qui officia deserunt fugiat quo tempore consequuntur dicta ratione sint commodi eum eligendi, magnam aliquid expedita quas accusantium, sed nobis tenetur illum mollitia. Quis ipsum tenetur distinctio tempore vitae
                atque quam.
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="card">
            <div class="card-header card-header-large bg-white">
                <h2 class="card-header__title">Mitra kerjasama Akademi Kripto</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card__course">
                            <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                                <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="#">
                                    <span><img src="assets/images/logos/react.svg" class="mb-1" style="width:34px;" alt="logo"></span>
                                    <span class="course__title">React</span>
                                    <span class="course__subtitle">Learn the Basics</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card__course">
                            <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                                <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="#">
                                    <span><img src="assets/images/logos/vuejs.svg" class="mb-1" style="width:34px;" alt="logo"></span>
                                    <span class="course__title">Vue.js</span>
                                    <span class="course__subtitle">Quick Tips</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card__course">
                            <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                                <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="#">
                                    <span><img src="assets/images/logos/angular.svg" class="mb-1" style="width:34px;" alt="logo"></span>
                                    <span class="course__title">Angular</span>
                                    <span class="course__subtitle">Back to Basics</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card__course">
                            <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                                <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="#">
                                    <span><img src="assets/images/logos/javascript.svg" class="mb-1" style="width:34px;" alt="logo"></span>
                                    <span class="course__title">Javascript</span>
                                    <span class="course__subtitle">ES6 and Beyond</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>