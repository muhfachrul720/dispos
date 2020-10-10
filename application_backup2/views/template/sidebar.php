<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <?php 
        $user_level = $this->session->userdata('user_level');
        $sql = "SELECT mn.* FROM tbl_hak_akses as ak JOIN tbl_menu as mn ON ak.menu = mn.id WHERE ak.user_level = $user_level ORDER BY mn.id ,'DESC'";

        $main_menu = $this->db->query($sql)->result();

        foreach($main_menu as $menu){
            $this->db->where('submenu', $menu->id);
            $submenu = $this->db->get('tbl_menu');
            if($submenu->num_rows() > 0){
        echo    '<li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon '.$menu->icon.'"></i>
                    <p>
                        '.ucwords($menu->nama).'
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                    <ul class="nav nav-treeview">';
                    foreach($submenu->result() as $sub){
            echo    '<li class="nav-item">
                        <a href="'.base_url($sub->url).'" class="nav-link">
                        <i class="'.$sub->icon.' nav-icon"></i>
                        <p>'.ucwords($sub->nama).'</p>
                        </a>
                    </li>';
                    }  
            echo    '</ul>
                </li>';
            } else {
        echo    ' <li class="nav-item">
                <a href="'.base_url($menu->url).'" class="nav-link">
                    <i class="nav-icon '.$menu->icon.'"></i>
                    <p>
                        '.ucwords($menu->nama).'
                    </p>
                </a>
                </li>';
            }
        }

    ?>

</ul>