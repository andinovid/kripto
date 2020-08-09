<div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">
    <div class="page__heading border-bottom">
        <div class="container-fluid page__container d-flex align-items-center">
            <h1 class="mb-0">
                <?php echo site_phrase('my_courses'); ?>
            </h1>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">

            <?php foreach ($my_courses as $my_course) :
                $instructor_details = $this->user_model->get_all_user($my_course['user_id'])->row_array(); ?>
                <div class="col-md-3">
                    <div class="card card__course">
                        <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center p-0">
                            <a class="d-block" href="<?php echo site_url('home/course/' . rawurlencode(slugify($my_course['title'])) . '/' . $my_course['id']); ?>" style="background-image:url('<?php echo $this->crud_model->get_course_thumbnail_url($my_course['id']); ?>'); background-size:cover; width:100%; height:100%;">
                            </a>
                        </div>
                        <div class="p-3">
                            <div class="mb-2">
                                <a class="card-header__title list-course-title" title="<?php echo $course['title']; ?>" href="<?php echo site_url('home/course/' . rawurlencode(slugify($my_course['title'])) . '/' . $my_course['id']); ?>">
                                    <?php echo $course_details['title']; ?>
                                </a>

                            </div>
                            <div class="d-flex align-items-center">
                                <?php if ($course_details['is_free_course'] == 1) : ?>
                                    <strong class="h4 m-0"><?php echo site_phrase('free'); ?></strong>
                                <?php else : ?>
                                    <?php if ($course_details['discount_flag'] == 1) : ?>
                                        <strong class="h4 m-0"><small><?php echo currency($course_details['price']); ?></small><?php echo currency($course_details['discounted_price']); ?></strong>
                                    <?php else : ?>
                                        <strong class="h4 m-0"><?php echo currency($course_details['price']); ?></strong>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>