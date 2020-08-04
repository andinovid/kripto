<div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">
    <div class="container-fluid page__container">
        <div class="card">
            <div class="card-header card-header-large bg-white">
                <h1 class="card-header__title"><?php echo site_phrase('top_courses'); ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php $top_courses = $this->crud_model->get_top_courses()->result_array();
                    $cart_items = $this->session->userdata('cart_items');
                    foreach ($top_courses as $top_course) : ?>
                        <div class="col-md-3">
                            <div class="card card__course">
                                <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center p-0">
                                    <a class="d-block" href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" style="background-image:url('<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>'); background-size:cover; width:100%; height:100%;">
                                    </a>
                                </div>
                                <div class="p-3">
                                    <div class="mb-2">
                                        <a class="card-header__title list-course-title" title="<?php echo $top_course['title']; ?>" href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>">
                                            <?php echo $top_course['title']; ?>
                                        </a>
                                        <span class="mr-2">
                                            <?php
                                            $total_rating =  $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
                                            $number_of_ratings = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
                                            if ($number_of_ratings > 0) {
                                                $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                            } else {
                                                $average_ceil_rating = 0;
                                            }

                                            for ($i = 1; $i < 6; $i++) : ?>
                                                <?php if ($i <= $average_ceil_rating) : ?>
                                                    <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                <?php else : ?>
                                                    <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_half</i></a>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </span>
                                        <strong><?php echo $average_ceil_rating; ?></strong><br />
                                        <small class="text-muted">(<?php echo $number_of_ratings; ?>)</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <?php if ($top_course['is_free_course'] == 1) : ?>
                                            <strong class="h4 m-0"><?php echo site_phrase('free'); ?></strong>
                                        <?php else : ?>
                                            <?php if ($top_course['discount_flag'] == 1) : ?>
                                                <strong class="h4 m-0"><small><?php echo currency($top_course['price']); ?></small><?php echo currency($top_course['discounted_price']); ?></strong>
                                            <?php else : ?>
                                                <strong class="h4 m-0"><?php echo currency($top_course['price']); ?></strong>
                                            <?php endif; ?>
                                        <?php endif; ?>
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
                                    <div class="card-header__title text-muted mb-2 d-flex">
                                        <?php
                                        $status_wise_courses = $this->crud_model->get_status_wise_courses();
                                        $number_of_courses = $status_wise_courses['active']->num_rows();
                                        echo $number_of_courses . ' ' . site_phrase('online_courses'); ?>
                                    </div>
                                    <span class="h4 m-0"><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></span>
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
                                    <div class="card-header__title text-muted mb-2 d-flex"><?php echo site_phrase('expert_instruction'); ?></div>
                                    <span class="h4 m-0"><?php echo site_phrase('find_the_right_course_for_you'); ?></span>
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
                                    <div class="card-header__title text-muted d-flex mb-2"><?php echo site_phrase('lifetime_access'); ?></div>
                                    <span class="h4 m-0"><?php echo site_phrase('learn_on_your_schedule'); ?></span>
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
                    <div class="col-md-12">
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

                                <div class="row">
                                    <?php $top_courses = $this->crud_model->get_free_courses()->result_array();
                                    $cart_items = $this->session->userdata('cart_items');
                                    foreach ($top_courses as $top_course) : ?>
                                        <div class="col-md-3">
                                            <div class="card card__course">
                                                <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center p-0">
                                                    <a class="d-block" href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" style="background-image:url('<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>'); background-size:cover; width:100%; height:100%;">
                                                    </a>
                                                </div>
                                                <div class="p-3">
                                                    <div class="mb-2">
                                                        <a class="card-header__title list-course-title" title="<?php echo $top_course['title']; ?>" href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>">
                                                            <?php echo $top_course['title']; ?>
                                                        </a>
                                                        <span class="mr-2">
                                                            <?php
                                                            $total_rating =  $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
                                                            $number_of_ratings = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
                                                            if ($number_of_ratings > 0) {
                                                                $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                                            } else {
                                                                $average_ceil_rating = 0;
                                                            }

                                                            for ($i = 1; $i < 6; $i++) : ?>
                                                                <?php if ($i <= $average_ceil_rating) : ?>
                                                                    <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                                <?php else : ?>
                                                                    <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_half</i></a>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </span>
                                                        <strong><?php echo $average_ceil_rating; ?></strong><br />
                                                        <small class="text-muted">(<?php echo $number_of_ratings; ?>)</small>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <?php if ($top_course['is_free_course'] == 1) : ?>
                                                            <strong class="h4 m-0"><?php echo site_phrase('free'); ?></strong>
                                                        <?php else : ?>
                                                            <?php if ($top_course['discount_flag'] == 1) : ?>
                                                                <strong class="h4 m-0"><small><?php echo currency($top_course['price']); ?></small><?php echo currency($top_course['discounted_price']); ?></strong>
                                                            <?php else : ?>
                                                                <strong class="h4 m-0"><?php echo currency($top_course['price']); ?></strong>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
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