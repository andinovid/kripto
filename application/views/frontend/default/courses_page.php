<?php
isset($layout) ? "" : $layout = "list";
isset($selected_category_id) ? "" : $selected_category_id = "all";
isset($selected_level) ? "" : $selected_level = "all";
isset($selected_language) ? "" : $selected_language = "all";
isset($selected_rating) ? "" : $selected_rating = "all";
isset($selected_price) ? "" : $selected_price = "all";
// echo $selected_category_id.'-'.$selected_level.'-'.$selected_language.'-'.$selected_rating.'-'.$selected_price;
$number_of_visible_categories = 10;
if (isset($sub_category_id)) {
    $sub_category_details = $this->crud_model->get_category_details_by_id($sub_category_id)->row_array();
    $category_details     = $this->crud_model->get_categories($sub_category_details['parent'])->row_array();
    $category_name        = $category_details['name'];
    $sub_category_name    = $sub_category_details['name'];
}
?>
<div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">
    <div class="page__heading border-bottom">
        <div class="container-fluid page__container d-flex align-items-center">
            <h1 class="mb-0">
                <?php
                if ($selected_category_id == "all") {
                    echo "Explore Courses";
                } else {
                    $category_details = $this->crud_model->get_category_details_by_id($selected_category_id)->row_array();
                    echo $category_details['name'];
                }
                ?>
            </h1>

        </div>
    </div>

    <div class="container-fluid page__container">
        <form action="#" class="mb-3 border-bottom pb-3">
            <div class="d-flex">
                <div class="search-form mr-3 search-form--light">
                    <input type="text" class="form-control" placeholder="Search courses" id="searchSample02">
                    <button class="btn" type="button"><i class="material-icons">search</i></button>
                </div>
                <div class="form-inline ml-auto">
                    <div class="form-group mr-3">
                        <label for="filter-category" class="form-label mr-1">Category</label>
                        <select id="filter-category" class="form-control custom-select" style="width: 200px;" onchange="filter(this)">
                            <option value="all">Semua Kategori</option>
                            <?php
                            $counter = 1;
                            $total_number_of_categories = $this->db->get('category')->num_rows();
                            $categories = $this->crud_model->get_categories()->result_array();
                            foreach ($categories as $category) : ?>
                                <option value="<?php echo $category['slug']; ?>" <?php if ($selected_category_id == $category['id']) echo 'selected'; ?>><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <?php foreach ($courses as $course) :
                $instructor_details = $this->user_model->get_all_user($course['user_id'])->row_array(); ?>
                <div class="col-md-3">
                    <div class="card card__course">
                        <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center p-0">
                            <a class="d-block" href="<?php echo site_url('home/course/' . rawurlencode(slugify($course['title'])) . '/' . $course['id']); ?>" style="background-image:url('<?php echo $this->crud_model->get_course_thumbnail_url($course['id']); ?>'); background-size:cover; width:100%; height:100%;">
                            </a>
                        </div>
                        <div class="p-3">
                            <div class="mb-2">
                                <a class="card-header__title list-course-title" title="<?php echo $course['title']; ?>" href="<?php echo site_url('home/course/' . rawurlencode(slugify($course['title'])) . '/' . $course['id']); ?>">
                                    <?php echo $course['title']; ?>
                                </a>
                                <span class="mr-2">
                                    <?php
                                    $total_rating =  $this->crud_model->get_ratings('course', $course['id'], true)->row()->rating;
                                    $number_of_ratings = $this->crud_model->get_ratings('course', $course['id'])->num_rows();
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
                                <?php if ($course['is_free_course'] == 1) : ?>
                                    <strong class="h4 m-0"><?php echo site_phrase('free'); ?></strong>
                                <?php else : ?>
                                    <?php if ($course['discount_flag'] == 1) : ?>
                                        <strong class="h4 m-0"><small><?php echo currency($course['price']); ?></small><?php echo currency($course['discounted_price']); ?></strong>
                                    <?php else : ?>
                                        <strong class="h4 m-0"><?php echo currency($course['price']); ?></strong>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <button onclick="handleCartItems(this)" class="btn btn-primary ml-auto"><i class="material-icons">add_shopping_cart</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <?php if (count($courses) == 0) : ?>
            <h2><?php echo site_phrase('no_result_found'); ?></h2>
        <?php endif; ?>
        <hr>
        <nav>
            <?php if ($selected_category_id == "all" && $selected_price == 0 && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all') {
                echo $this->pagination->create_links();
            } ?>
        </nav>
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