<?php
class infoModel extends init
{
    public $out;
    public $id;
    public function __construct()
    {
        parent::__construct();
        $this->id = $this->helper->segment(1);
    }
    public function selectJoin():string {
        /**Select**/
        $this->db->select("*");
        $this->db->from("posts");
        $this->db->join_table("post_cat");
        $this->db->join_where("post_cat.cat_id","posts.cat_id");
        $this->db->join_method("inner");
        $this->db->where("posts.id","21");
        $this->db->or_where("posts.id","22");
        $result = $this->db->exec("get");
        return $result;
    }
    public function postList(int $catID):string {
        $this->db->select("*");
        $this->db->from("posts");
        if($catID > 0){
            $this->db->where("cat_id", $catID);
        }
        $result = $this->db->exec("get");
        return $result;
    }

    public function postByID(int $id):string {
        $this->db->select("*");
        $this->db->from("posts");
        $this->db->where("id", $id);
        $result = $this->db->exec("get");
        return $result;
    }

    public function postCats():string {
        $this->db->select("*");
        $this->db->from("post_cat");
        $result = $this->db->exec("get");
        return $result;
    }

    public function addCat(string $catNameGeo, string $catNameEng, string $catNameRus):int {
        /*Insert*/
        $this->db->table("post_cat");
        $this->db->columns("cat_name_geo", "cat_name_eng", "cat_name_rus");
        $this->db->values($catNameGeo, $catNameEng, $catNameRus);
        return $this->db->exec("INSERT");
    }

    public function recordToBase(string $title, string $description, string $details):int {
        /*Insert*/
        $this->db->table("posts");
        $this->db->columns("title_geo", "description_geo", "details_geo");
        $this->db->values($title,$description,$details);
        return $this->db->exec("INSERT");
    }

    public function infoUpdateBase($postID, $titleGeo, $titleEng, $titleRus, $descriptionGeo, $descriptionEng, $descriptionRus, $detailsGeo, $detailsEng, $detailsRus, $catID, $postDate){
        /*update*/
        $this->db->table("posts");
        $this->db->columns("title_geo", "title_eng", "title_rus", "description_geo", "description_eng", "description_rus", "details_geo", "details_eng", "details_rus", "cat_id", "post_date");
        $this->db->values($titleGeo, $titleEng, $titleRus, $descriptionGeo, $descriptionEng, $descriptionRus, $detailsGeo, $detailsEng, $detailsRus, $catID, $postDate);
        $this->db->where("id",$postID);
        return $this->db->exec("UPDATE");
    }

    public function infoUpdateBaseWithPhoto($postID, $titleGeo, $titleEng, $titleRus, $descriptionGeo, $descriptionEng, $descriptionRus, $detailsGeo, $detailsEng, $detailsRus, $catID, $postDate, $photo){
        /*update*/
        $this->db->table("posts");
        $this->db->columns("title_geo", "title_eng", "title_rus", "description_geo", "description_eng", "description_rus", "details_geo", "details_eng", "details_rus", "cat_id", "post_date", "photo");
        $this->db->values($titleGeo, $titleEng, $titleRus, $descriptionGeo, $descriptionEng, $descriptionRus, $detailsGeo, $detailsEng, $detailsRus, $catID, $postDate, $photo);
        $this->db->where("id",$postID);
        return $this->db->exec("UPDATE");
    }

    public function infoToBase($titleGeo, $titleEng, $titleRus, $descriptionGeo, $descriptionEng, $descriptionRus, $detailsGeo, $detailsEng, $detailsRus, $catID, $postDate, $photo){
        /*Insert*/
        $this->db->table("posts");
        $this->db->columns("title_geo", "title_eng", "title_rus", "description_geo", "description_eng", "description_rus", "details_geo", "details_eng", "details_rus", "cat_id", "post_date", "photo");
        $this->db->values($titleGeo, $titleEng, $titleRus, $descriptionGeo, $descriptionEng, $descriptionRus, $detailsGeo, $detailsEng, $detailsRus, $catID, $postDate, $photo);
        return $this->db->exec("INSERT");
    }

    public function deleteFromBase($id){
        /*Delete*/
        $this->db->table("posts");
        $this->db->where("id",$id);
        $this->db->exec("DELETE");
    }

    public function deleteCat($catID){
        /*Delete*/
        $this->db->table("post_cat");
        $this->db->where("cat_id",$catID);
        $this->db->exec("DELETE");
        $this->db->table("posts");
        $this->db->where("cat_id",$catID);
        $this->db->exec("DELETE");
    }

    public function membersUser($userId){
        /*Get*/
        $this->db->select("*");
        $this->db->table("members");
        $this->db->where("user_id",$userId);
        $result = $this->db->exec("get");
        return $result;
    }

    public function infoToCupons($cupon_code, $cupon_amount, $status){
        /*Insert*/
        $this->db->table("cupons");
        $this->db->columns("cupon_code", "cupon_amount","status");
        $this->db->values($cupon_code, $cupon_amount,$status);
        return $this->db->exec("INSERT");
    }
}
