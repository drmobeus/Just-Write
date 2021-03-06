<?php

class Settings_model extends CI_Model
{

    /**
     * Returns a user's id from their record according
     * to the username given.
     */
    public function get_user_id()
    {
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->select('id');
        $this->db->from('users');
        $query = $this->db->get();

        if ($query->num_rows == 1) {
            foreach($query->result() as $row){
                return $row->id;
            }
        }
    }

    /**
     * Creates a record in database when none is
     * found matching the user's ID.
     */
    public function create_users_settings()
        // Creates a user's settings
    {
        $this->db->where( 'user_id', $this->get_user_id() );
        $query = $this->db->get( 'settings' );

        if( $query->num_rows() == 0 )
        {
            $user = array(
                'user_id' => $this->get_user_id()
            );

            $this->db->insert( 'settings', $user );
        }
    }

    /**
     * Returns an array containing a user's settings
     * when supplied with a user's ID.
     *
     * If no records where found matching the user's
     * ID, function returns false.
     */
    function fetch_users_settings()
        // fetches a user's settings
    {
        $this->db->where( 'user_id', $this->get_user_id() );
        $query = $this->db->get( 'settings' );

        if( $query->num_rows() == 1 )
        {
            $user = $query->row();
            return $user;
        }
        else
        {
            return false;
        }
    }

    /**
     * Updates record matching user's ID, toggling bool.
     *
     * When no record is found matching a user's ID,
     * change_theme() calls create_users_settings() and
     * then calls itself again.
     */
    function change_theme()
        // Toggles theme
    {
        $this->db->where( 'user_id', $this->get_user_id() );
        $query = $this->db->get( 'settings' );

        if( $query->num_rows() == 1 )
        {
            $user = $query->row();

            if( $user->theme == null || $user->theme == 0 )
                // If the user's theme is set to the default
            {
                $theme = array(
                    'theme' => 1
                );
            }
            else
            {
                $theme = array(
                    'theme' => 0
                );
            }

            $this->db->where( 'user_id', $this->get_user_id() );
            $this->db->update( 'settings', $theme );

            return true;
        }
        else
        {
            $this->create_users_settings();
            $this->change_theme();
        }
    }

}
?>
