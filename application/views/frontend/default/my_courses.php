<?php

$my_courses = $this->user_model->my_courses()->result_array();

$categories = array();
foreach ($my_courses as $my_course) {
    $course_details = $this->crud_model->get_course_by_id($my_course['course_id'])->row_array();
    if (!in_array($course_details['category_id'], $categories)) {
        array_push($categories, $course_details['category_id']);
    }
}
?>
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
                $course_details = $this->crud_model->get_course_by_id($my_course['course_id'])->row_array();
                $instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array(); ?>
                <div class="col-md-3">
                    <div class="card card__course">
                        <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center p-0">
                            <a class="d-block" href="<?php echo site_url('home/course/' . rawurlencode(slugify($course_details['title'])) . '/' . $my_course['course_id']); ?>" style="background-image:url('<?php echo $this->crud_model->get_course_thumbnail_url($my_course['course_id']); ?>'); background-size:cover; width:100%; height:100%;">
                            </a>
                        </div>
                        <div class="p-3">
                            <div class="mb-2">
                                <a class="card-header__title list-course-title" title="<?php echo $course['title']; ?>" href="<?php echo site_url('home/course/' . rawurlencode(slugify($course['title'])) . '/' . $course['id']); ?>">
                                    <?php echo $course_details['title']; ?>
                                </a>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo course_progress($my_course['course_id']); ?>%" aria-valuenow="<?php echo course_progress($my_course['course_id']); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small><?php echo ceil(course_progress($my_course['course_id'])); ?>% <?php echo site_phrase('completed'); ?></small>

                                <span class="mr-2">
                                    <?php
                                    $get_my_rating = $this->crud_model->get_user_specific_rating('course', $my_course['course_id']);
                                    for ($i = 1; $i < 6; $i++) : ?>
                                        <?php if ($i <= $get_my_rating['rating']) : ?>
                                            <a href="#" class="rating-link active"><i class="fas fa-star filled"></i></a>
                                        <?php else : ?>
                                            <a href="#" class="rating-link active"><i class="fas fa-star"></i></a>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($course_details['title'])) . '/' . $my_course['course_id']); ?>" class="btn btn-purple ml-auto"><?php echo site_phrase('course_detail'); ?></a>
                                <a href="<?php echo site_url('home/lesson/' . rawurlencode(slugify($course_details['title'])) . '/' . $my_course['course_id']); ?>" class="btn btn-light ml-auto"><?php echo site_phrase('start_lesson'); ?></a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<script type="text/javascript">
    function get_url() {
        var urlPrefix = '<?php echo site_url('home/courses?'); ?>'
        var urlSuffix = "";
        var slectedCategory = "";

        slectedCategory = $('#filter-category option:selected').val();

        urlSuffix = "category=" + slectedCategory;
        var url = urlPrefix + urlSuffix;
        return url;
    }

    function filter() {
        var url = get_url();
        window.location.replace(url);
        //console.log(url);
    }

    function toggleLayout(layout) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/set_layout_to_session'); ?>',
            data: {
                layout: layout
            },
            success: function(response) {
                location.reload();
            }
        });
    }

    function showToggle(elem, selector) {
        $('.' + selector).slideToggle(20);
        if ($(elem).text() === "<?php echo site_phrase('show_more'); ?>") {
            $(elem).text('<?php echo site_phrase('show_less'); ?>');
        } else {
            $(elem).text('<?php echo site_phrase('show_more'); ?>');
        }
    }
</script>


<script type="text/javascript">
    function getCoursesByCategoryId(category_id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/my_courses_by_category'); ?>',
            data: {
                category_id: category_id
            },
            success: function(response) {
                $('#my_courses_area').html(response);
            }
        });
    }

    function getCoursesBySearchString(search_string) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/my_courses_by_search_string'); ?>',
            data: {
                search_string: search_string
            },
            success: function(response) {
                $('#my_courses_area').html(response);
            }
        });
    }

    function getCourseDetailsForRatingModal(course_id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/get_course_details'); ?>',
            data: {
                course_id: course_id
            },
            success: function(response) {
                $('#course_title_1').append(response);
                $('#course_title_2').append(response);
                $('#course_thumbnail_1').attr('src', "<?php echo base_url() . 'uploads/thumbnails/course_thumbnails/'; ?>" + course_id + ".jpg");
                $('#course_thumbnail_2').attr('src', "<?php echo base_url() . 'uploads/thumbnails/course_thumbnails/'; ?>" + course_id + ".jpg");
                $('#course_id_for_rating').val(course_id);
                // $('#instructor_details').text(course_id);
                console.log(response);
            }
        });
    }
</script>