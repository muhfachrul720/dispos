<nav class="bottom-navbar">
          <div class="container">
            <ul class="nav page-navigation">

            <?php if ($this->session->userdata('id_user_level') == 1): ?>
              <li class="nav-item">
                <a class="nav-link" href="index.html">
                  <i class="mdi mdi-compass-outline menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
            <?php elseif ($this->session->userdata('id_user_level') == 2):?>
              <li class="nav-item">
                <a class="nav-link" href="index.html">
                  <i class="mdi mdi-compass-outline menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
            <?php endif?>

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
                    echo ' <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="'.$menu->icon.'"></i>
                                <span class="menu-title">'.strtoupper($menu->title).'</span>
                                <i class="menu-arrow"></i>
                              </a>
                              <div class="submenu">
                                <ul class="submenu-item">';
                                foreach ($submenu->result() as $sub){
                                    echo "<li>".anchor($sub->url,"<i class='$sub->icon'></i> ".strtoupper($sub->title))."</li>"; 
                                    echo '<li class="nav-item">
                                            '.anchor($sub->url, strtoupper($sub->title)).'
                                          </li>';
                                } 

                                echo '</ul>
                              </div>
                            </li>';
                }else{
                    // display main menu
                    echo "<li class='nav-item'>";
                    // echo "<a class='nav-link' href='$menu->url' aria-expanded='true'> <i class='".$menu->icon."'></i>  $menu->title</a>";
    
                    $atts = array(
                        'class'         => 'nav-link',
                        'aria-expanded'   => 'true'
                    );
    
                    echo anchor($menu->url, '<i class="p-0'.$menu->icon.'"></i><span class="">'.$menu->title.'</span>' , $atts);
                    echo "</li>";
                }
            }
            ?>
        
            </ul>
          </div>
        </nav>