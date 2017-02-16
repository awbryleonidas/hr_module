<?php 
/*
 * function that generate the action buttons edit, delete
 */
function get_buttons($id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="'.  base_url().'employee/edit/'.$id.'"><img src="'.  base_url().'assets/images/edit.png"/></a>';
    $html .='<a href="'.  base_url().'employee/delete/'.$id.'"><img src="'.  base_url().'assets/images/delete.png"/></a>';
    $html.='</span>';
    
    return $html;
}