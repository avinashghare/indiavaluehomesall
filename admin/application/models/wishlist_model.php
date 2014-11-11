<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Wishlist_model extends CI_Model
{

	public function viewwishlist()
	{
		$query="SELECT `user`.`name` as `name`,`property`.`name` as `property`,`propertywishlist`.`timestamp` as `timestamp` FROM `propertywishlist`
		INNER JOIN `user` ON `user`.`id` = `propertywishlist`.`user`
		INNER JOIN `property` ON `propertywishlist`.`property` = `property`.`id`		
		ORDER BY `propertywishlist`.`timestamp` DESC";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
	
	public function viewwishlista()
	{
		$query="SELECT `propertywishlist`.`property`, `propertywishlist`.`name` as `pname`, `propertywishlist`.`email`, `propertywishlist`.`phone`, `propertywishlist`.`timestamp`,`property`.`name` as `propertyname`,`builder`.`name` as `buildername` FROM `propertywishlist` INNER JOIN `property` ON `propertywishlist`.`property`=`property`.`id`
INNER JOIN `builder` ON `builder`.`id`=`property`.`builder`";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
	 public function exportcontact() {
        
		$this->load->dbutil();
        $query=$this->db->query("SELECT `id`, `name`, `email`, `contact`, `comment`, `timestamp` FROM `contact`");
        //return $query;
        $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';

        if ( ! write_file('./csvgenerated/contactfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
             echo 'File written!';
        }
    }
    public function exportwishlist() {
        
		$this->load->dbutil();
        $query=$this->db->query("SELECT `propertywishlist`.`property`, `propertywishlist`.`name` as `pname`, `propertywishlist`.`email`, `propertywishlist`.`phone`, `propertywishlist`.`timestamp`,`property`.`name` as `propertyname`,`builder`.`name` as `buildername` FROM `propertywishlist` INNER JOIN `property` ON `propertywishlist`.`property`=`property`.`id`
INNER JOIN `builder` ON `builder`.`id`=`property`.`builder`");
        //return $query;
        $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';

        if ( ! write_file('./csvgenerated/wishlistfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
             echo 'File written!';
        }
    }
    public function exportregistereduser() {
        
		$this->load->dbutil();
        $query=$this->db->query("SELECT `id`, `name`, `email`, `city`, `contact`, `timestamp` FROM `offers`");
        //return $query;
        $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';

        if ( ! write_file('./csvgenerated/registereduserfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
             echo 'File written!';
        }
    }
	
	public function viewuserwishlist($user)
	{
		$query="SELECT `user`.`name` as `name`,`property`.`name` as `property`,`propertywishlist`.`timestamp` as `timestamp` FROM `propertywishlist`
		INNER JOIN `user` ON `user`.`id` = `propertywishlist`.`user` AND `propertywishlist`.`user`='$user'
		INNER JOIN `property` ON `propertywishlist`.`property` = `property`.`id`		
		ORDER BY `propertywishlist`.`timestamp` DESC";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
	public function viewpropertywishlist($property)
	{
        $query="SELECT `propertywishlist`.`name` as `name`,`propertywishlist`.`email` as `email`,`propertywishlist`.`phone` as `phone`,`property`.`name` as `property`,`propertywishlist`.`timestamp` as `timestamp` FROM `propertywishlist`
		INNER JOIN `property` ON `propertywishlist`.`property` = `property`.`id` AND `propertywishlist`.`property`='$property'		
		ORDER BY `propertywishlist`.`timestamp` DESC";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
    public function addpropertywishlist($property,$name,$email,$phone) {
        $data  = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'property' => $property,

        );

        $this->db->insert( 'propertywishlist', $data );
        return 1;
    }
    
    public function submitcontact($name,$email,$comment,$contact) {
        $data  = array(
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'comment' => $comment,

        );

        $this->db->insert( 'contact', $data );
        return 1;
    }
    public function submitoffers($name,$email,$city,$contact) {
        $data  = array(
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'city' => $city,

        );

        $this->db->insert( 'offers', $data );
        return 1;
    }
    
    public function viewcontact() {
        $query=$this->db->query("SELECT * FROM `contact`")->result();
        return $query;
    }
    public function viewoffers() {
        $query=$this->db->query("SELECT * FROM `offers`")->result();
        return $query;
    }
    
    
}
?>