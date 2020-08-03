<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="<?php echo base_url(); ?>assets/template/template/assets/images/faces/face1.jpg" alt="profile" />
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                <span class="font-weight-semibold mb-1 mt-2 text-center"><?php echo $this->session->userdata('username'); ?></span>
              </div>
            </a>
          </li>
          <li class="nav-item pt-3">
            <a class="nav-link d-block" href="index.html">
              <img class="sidebar-brand-logo" src="<?php echo base_url(); ?>assets/template/template/assets/images/logo.svg" alt="" />
              <img class="sidebar-brand-logomini" src="<?php echo base_url(); ?>assets/template/template/assets/images/logo-mini.svg" alt="" />
              <div class="small font-weight-light pt-1">Sistem Informasi Data FISIP</div>
            </a>
            <form class="d-flex align-items-center" action="#">
              <div class="input-group">
                <div class="input-group-prepend">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control border-0" placeholder="Search" />
              </div>
            </form>
          </li>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">Dashboard Admin</span>
          </li>
          
          <?php if ($this->session->userdata('id_user_level') == 1): ?>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>Dashboardb">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

          <?php elseif ($this->session->userdata('id_user_level') == 2): ?>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>Dashboard">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

          <?php endif ?>

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

        // var_dump($main_menu);
        // die;

          foreach ($main_menu as $menu){
            // chek is have sub menu
            $this->db->where('is_main_menu',$menu->id_menu);
            $this->db->where('is_aktif','y');
            $submenu = $this->db->get('tbl_menu');
            if($submenu->num_rows()>0){
                // display sub menu
              echo "<li class='nav-item'>
              <a href='#' class='nav-link' data-toggle='collapse' aria-expanded='false'>
              <i class='$menu->icon'></i>
              <span class='menu-title'>".ucwords($menu->title)."</span>
              <i class='menu-arrow'></i>
              </a>
              <ul class='nav flex-column sub-menu' style='display: none;'>";
              foreach ($submenu->result() as $sub){
                echo "<li>".anchor($sub->url,"<i class='$sub->icon'></i> ".ucwords($sub->title))."</li>"; 
              }
              echo" </ul>
              </li>";
            }else{
                // display main menu
              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='$menu->url'> <i class='".$menu->icon."'></i><span class='menu-title'>".ucwords($menu->title)."</span></a>";

              // $atts = array(
              //   'class'         => 'nav-link',
              //   'aria-expanded'   => 'false',
              //   'aria-controls' => 'ui-basic',
              //   'data-toggle' => 'collapse'
              // );

              // echo anchor($menu->url, "<i class='".$menu->icon."'></i> ".($menu->title), $atts);
              echo "</li>";
            }
          }
          ?>
          
          <li class="nav-item pt-3">
            <a class="nav-link" href="<?php echo base_url(); ?>Auth/logout">
              <i class="mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>