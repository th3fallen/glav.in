<?php
    /**
     * Glav.in
     *
     * A very simple CMS
     *
     *
     * @package        Glav.in
     * @author        Matt Sparks
     * @copyright    Copyright (c) 2013, Matt Sparks (http://www.mattsparks.com)
     * @license        http://opensource.org/licenses/MIT The MIT License (MIT)
     * @link        http://glav.in
     * @since        1.0.0-alpha
     */
?>
<div id="page-description">
    <h1>Users</h1>

    <p>Below is a list of all of your site's users. From here you are able to edit and delete existing pages. To create
       a new page, click the button in the upper right.</p>
    <a href="create_user" title="Create User" id="create-user-btn" class="btn">Create User</a>
</div><!-- end page-description -->
<div id="admin-content-body">
    <ul id="admin-pages-list">
        <?php

            // Get all of the users
            $users = $user->get_users();

            // List the rest of the users
            foreach ($users as $user) {
                $user_name = basename($user, '.json');

                echo '<li>';
                echo '<a href="' . base_url() . $user_name . '">' . str_replace('_', ' ', $user_name) . '</a>';
                echo '<a href="edit_user/' . $user_name . '" class="action-btn">Edit</a>';
                echo '<a href="delete_user/' . $user_name . '" class="action-btn">Delete</a>';
                echo '</li>';

            }

        ?>
    </ul>