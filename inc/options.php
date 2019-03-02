<?php

class Advanced_Sidebar_Nav_Widget_Opts
{
    protected static function _helper($args)
    {
        $arr = array();

        switch ($args) {
            case 'menu':
                if ($menus = wp_get_nav_menus()) {
                    foreach ($menus as $menu) {
                        $arr[$menu->term_id] = $menu->name;
                    }
                }

                break;
        }

        return $arr;
    }

    public static function text($args)
    {
        $defaults = array(
            'name' => '',
            'label' => '',
            'description' => '',
            'value' => '',
            'html_class' => '',
            'html_id' => '',
        );

        $args = wp_parse_args($args, $defaults);

        $html = '<p>
			<label for="' . $args['name'] . '" class="widefat">' . $args['label'] . '</label>
			<input type="text" name="' . $args['name'] . '" class="widefat" value="' . $args['value'] . '">
		</p>';

        return $html;
    }

    public static function select($args)
    {
        $defaults = array(
            'name' => '',
            'label' => '',
            'description' => '',
            'options' => array(),
            'default' => '',
            'html_class' => '',
            'html_id' => '',
        );

        $args = wp_parse_args($args, $defaults);

        if (is_string($args['options'])) {
            $args['options'] = self::_helper($args['options']);
        }

        $html = '<p>
			<label for="' . $args['name'] . '" class="widefat">' . $args['label'] . '</label>
			<select name="' . $args['name'] . '" class="widefat">';

        if (!empty($args['options'])) {
            foreach ($args['options'] as $key => $value) {
                $html .= '<option value="' . esc_html($key) . '" ' . (esc_html($args['default']) == esc_html($key) ? 'selected' : '') . '>' . esc_html($value) . '</option>';
            }
        }

        $html .= '</select></p>';

        return $html;
    }
}
