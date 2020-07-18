
     <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
       
       <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-laugh-wink"></i> -->
          <i class="fas fa-business-time"></i>
          <!-- <i class="fas fa-alarm-clock"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">APA <sup>UHO</sup></div>
      </a>

      <hr class="sidebar-divider my-0">
      
      <?php if ($this->session->userdata('id_user_level') == 1): ?>
            
        <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>Dashboardb">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

      <?php elseif ($this->session->userdata('id_user_level') == 2): ?>
        
        <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>Dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>
          
      <?php endif ?>
      

       <!-- Divider -->
       <hr class="sidebar-divider">

        <?php
        // chek settingan tampilan menu
        $setting = $this->db->get_where('tbl_setting',array('id_setting'=>1))->row_array();
        if($setting['value']=='ya'){
            // cari level user
            $id_user_level = $this->session->userdata('id_user_level');
            $sql_menu = "SELECT * 
            FROM tbl_menu 
            WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu=0 and is_aktif='y'";
        }else{
            $sql_menu = "select * from tbl_menu where is_aktif='y' and is_main_menu=0";
        }

        $main_menu = $this->db->query($sql_menu)->result();
        
        foreach ($main_menu as $menu){
            // chek is have sub menu
            $this->db->where('is_main_menu',$menu->id_menu);
            $this->db->where('is_aktif','y');
            $submenu = $this->db->get('tbl_menu');
            if($submenu->num_rows()>0){
                // display sub menu
                echo "<li class='nav-item'>
                        <a href='#' class='nav-link'>
                            <i class='$menu->icon'></i> <span>".strtoupper($menu->title)."</span>
                            <span class='pull-right-container'>
                                <i class='fas fa-fw fa-angle-left pull-right'></i>
                            </span>
                        </a>
                        <ul class='treeview-menu' style='display: none;'>";
                        foreach ($submenu->result() as $sub){
                            echo "<li>".anchor($sub->url,"<i class='$sub->icon'></i> ".strtoupper($sub->title))."</li>"; 
                        }
                        echo" </ul>
                    </li>";
            }else{
                // display main menu
                echo "<li class='nav-item'>";
                // echo "<a class='nav-link' href='$menu->url' aria-expanded='true'> <i class='".$menu->icon."'></i>  $menu->title</a>";

                $atts = array(
                    'class'         => 'nav-link',
                    'aria-expanded'   => 'true'
                );

                echo anchor($menu->url, "<i class='".$menu->icon."'></i> ".($menu->title), $atts);
                echo "</li>";
            }
        }
        ?>
        <li class='nav-item'><a class='nav-link' href="<?php echo base_url(); ?>Auth/logout"><i class="fas fa-sign-out-alt"></i>  LOGOUT</a></li>
       
    </ul>
