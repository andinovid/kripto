<?php
$instructor_list = $this->user_model->get_instructor_list()->result_array();
?>
<div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">
    <div class="app-chat-container">
        <div class="row h-100 m-0">
            <div class="col-lg-4 py-3 px-0 d-none d-lg-flex flex-column h-100">
                <div class="flex pt-3" data-perfect-scrollbar>
                    <div class="list-group list-group-flush" style="position: relative; z-index: 0;">
                        <?php
                        $current_user = $this->session->userdata('user_id');
                        $this->db->where('sender', $current_user);
                        $this->db->or_where('receiver', $current_user);
                        $message_threads = $this->db->get('message_thread')->result_array();
                        foreach ($message_threads as $row) :

                            // defining the user to show
                            if ($row['sender'] == $current_user)
                                $user_to_show_id = $row['receiver'];
                            if ($row['receiver'] == $current_user)
                                $user_to_show_id = $row['sender'];

                            $last_messages_details =  $this->crud_model->get_last_message_by_message_thread_code($row['message_thread_code'])->row_array();
                        ?>
                            <div class="list-group-item d-flex align-items-start bg-transparent">
                                <div class="mr-3 d-flex flex-column align-items-center">
                                    <a href="<?php echo site_url('home/my_messages/read_message/' . $row['message_thread_code']); ?>" class="avatar avatar-xs mb-2">
                                        <img src="<?php echo $this->user_model->get_user_image_url($user_to_show_id); ?>" alt="Avatar" class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="flex">
                                    <p class="m-0">
                                        <span class="d-flex align-items-center mb-1">
                                            <a href="<?php echo site_url('home/my_messages/read_message/' . $row['message_thread_code']); ?>" class="text-dark-gray">
                                                <strong>
                                                    <?php
                                                    $user_to_show_details = $this->user_model->get_all_user($user_to_show_id)->row_array();
                                                    echo $user_to_show_details['first_name'] . ' ' . $user_to_show_details['last_name'];
                                                    ?>
                                                </strong>
                                            </a>
                                            <small class="ml-auto text-muted"><?php echo date('D, d-M-Y', $last_messages_details['timestamp']); ?></small>
                                        </span>
                                        <span class="d-flex align-items-end">
                                            <span class="flex mr-3">
                                                <small class="text-muted" style="max-height: 2.5rem; overflow: hidden; position: relative; display: inline-block;"><?php echo $last_messages_details['message']; ?></small>
                                            </span>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="border-top pt-3 px-3 text-center">
                    <button class="btn btn-purple" type="button" id="NewMessage" onclick="NewMessage(event)">Create Message</button>
                </div>
            </div>
            <div class="col-lg-8 py-3 px-4 bg-white border-left d-flex flex-column h-100">
                <div id="toggle-1">
                    <?php include 'inner_messages.php'; ?>
                </div>
                <div class="message-details-box" id="toggle-2" style="display: none;">
                    <div class="new-message-details">
                        <div class="message-header">
                            <div class="sender-info">
                                <span class="d-inline-block">
                                    <i class="far fa-user"></i>
                                </span>
                                <span class="d-inline-block"><?php echo site_phrase('new_message'); ?></span>
                            </div>
                        </div>
                        <form class="mt-3" action="<?php echo site_url('home/my_messages/send_new'); ?>" method="post">
                            <div class="message-body">
                                <div class="form-group">
                                    <select class="form-control select2" name="receiver">
                                        <?php foreach ($instructor_list as $instructor) :
                                            if ($instructor['id'] == $this->session->userdata('user_id'))
                                                continue;
                                        ?>
                                            <option value="<?php echo $instructor['id']; ?>"><?php echo $instructor['first_name'] . ' ' . $instructor['last_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-purple"><?php echo site_phrase('send'); ?></button>
                                <button type="button" class="btn btn-light" onclick="CancelNewMessage(event)">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function NewMessage(e) {

        e.preventDefault();
        $('#toggle-1').hide();
        $('#toggle-2').show();
        $('#NewMessage').removeAttr('onclick');
    }

    function CancelNewMessage(e) {

        e.preventDefault();
        $('#toggle-2').hide();
        $('#toggle-1').show();

        $('#NewMessage').attr('onclick', 'NewMessage(event)');
    }
</script>