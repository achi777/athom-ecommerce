<?php
class Model extends init
{
    public $out;
    public $id;
    public function __construct()
    {
        parent::__construct();
        $this->id = $this->helper->segment(1);
    }
    public function selectJoin(): string
    {
        /**Select**/
        $this->db->select("*");
        $this->db->from("posts");
        //$this->db->join("cat","cat.cat_id=information.cat_id");
        //$this->db->join("cat","cat.cat_id=information.cat_id","left");
        $this->db->join_table("cat");
        $this->db->join_where("cat.cat_id", "posts.cat_id");
        $this->db->join_method("inner");
        $this->db->where("posts.id", "21");
        $this->db->or_where("posts.id", "22");
        $result = $this->db->exec("get");
        return $result;
    }
    public function randomPost(): string
    {
        $this->db->select("*");
        $this->db->from("posts");
        $this->db->order("RAND()");
        $this->db->limit(1);
        $result = $this->db->exec("get");
        return $result;
    }

    public function catalog(): string
    {
        $this->db->select("*");
        $this->db->from("product_cat");
        $this->db->where("cat_status", 1);
        $this->db->where("cat_parent_id", 0);
        $result = $this->db->exec("get");
        return $result;
    }

    public function catalogByID(int $catID): string
    {
        $this->db->select("*");
        $this->db->from("product_cat");
        $this->db->where("cat_status", 1);
        $this->db->where("cat_parent_id", $catID);
        $result = $this->db->exec("get");
        return $result;
    }
    public function catByID(int $catID): string
    {
        $this->db->select("*");
        $this->db->from("product_cat");
        $this->db->where("cat_status", 1);
        $this->db->where("cat_id", $catID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function catalogSub(): string
    {
        $catArray = json_decode($this->catalog());
        $subCatArray[] = array();
        $myArray[] = array();
        $i = 0;
        if (is_array($catArray)) {
            foreach ($catArray as $item) {

                $myArray = json_decode($this->catalogByID($item->cat_id));

                if (is_array($myArray)) {
                    foreach ($myArray as $value) {
                        $item = array(
                            'cat_id' => $value->cat_id,
                            'cat_parent_id' => $value->cat_parent_id,
                            'cat_name_geo' => $value->cat_name_geo
                        );
                        $data_array[] = $item;
                    }
                }
            }
        }

        // var_dump($data_array);
        return json_encode(@$data_array);
    }

    public function postByID(int $id): string
    {
        $this->db->select("*");
        $this->db->from("posts");
        $this->db->where("id", $id);
        $result = $this->db->exec("get");
        return $result;
    }

    public function postList(): string
    {
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("posts");
        $this->db->limit($this->db->paginationLimit(2, 6));
        $result = $this->db->exec("get");
        return $result;
    }

    public function recordToBase(string $title, string $description, string $details): int
    {
        /*Insert*/
        $this->db->table("posts");
        $this->db->columns("title", "description", "details");
        $this->db->values($title, $description, $details);
        return $this->db->exec("INSERT");
    }
    public function updateToBase(int $id, string $title, string $description, string $details)
    {
        /*Update*/
        $this->db->table("information");
        $this->db->columns("title", "description", "details");
        $this->db->values($title, $description, $details);
        $this->db->where("id", $id);
        $this->db->exec("UPDATE");
    }
    public function deleteFromBase($id)
    {
        /*Delete*/
        $this->db->table("information");
        $this->db->where("id", $id);
        $this->db->exec("DELETE");
    }

    public function productList()
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where("product_status", 1);
        $this->db->order("product_id", "DESC");
        $this->db->limit(12);
        $result = $this->db->exec("get");
        return $result;
    }

    public function productGrids($catID)
    {
        $this->db->select("product.product_id, 
        product.brand_id, 
        product.product_name_geo, 
        product.product_name_eng, 
        product.product_name_rus, 
        product.product_desc_geo, 
        product.product_desc_eng, 
        product.product_desc_rus, 
        product.product_full_geo, 
        product.product_full_eng, 
        product.product_full_rus, 
        product.product_price, 
        product.product_sale, 
        product_photos.photo_id, 
        product_photos.photo_url, 
        product_cat.cat_id, 
        product_cat.cat_parent_id, 
        product_cat.cat_name_geo, 
        product_cat.cat_name_eng, 
        product_cat.cat_name_rus, 
        product_cat.photo");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("left");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id", "product.cat_id");
        $this->db->join_method("inner");
        $this->db->where("product_cat.cat_status", 1);
        $this->db->where("product.product_status", 1);
        $this->db->where("product.cat_id", $catID);
        $this->db->or_where("product_cat.cat_parent_id", $catID);
        $this->db->group("product.product_id");
        $this->db->limit($this->db->paginationLimit(9));
        $this->db->order("product.product_id", "DESC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function productByParams($catID, $params)
    {
        $this->db->select("product.product_id, 
        product.brand_id, 
        product.product_name_geo, 
        product.product_name_eng, 
        product.product_name_rus, 
        product.product_desc_geo, 
        product.product_desc_eng, 
        product.product_desc_rus, 
        product.product_full_geo, 
        product.product_full_eng, 
        product.product_full_rus, 
        product.product_price, 
        product.product_sale, 
        product_photos.photo_id, 
        product_photos.photo_url, 
        product_cat.cat_id, 
        product_cat.cat_parent_id, 
        product_cat.cat_name_geo, 
        product_cat.cat_name_eng, 
        product_cat.cat_name_rus, 
        product_cat.photo,
        product_cat.cat_status,
        variations.sku,
        variations.color_id,
        variations.size_id
        ");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("left");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id", "product.cat_id");
        $this->db->join_method("inner");
        $this->db->join_table("variations");
        $this->db->join_where("variations.product_id", "product.product_id");
        $this->db->join_method("inner");
        //$this->db->where("product_cat.cat_status", 1);
        $this->db->where("product.product_status", 1);
        if ($params[0]->brandID != "x") {
            $this->db->where("product.brand_id", $params[0]->brandID);
        }
        if ($params[0]->colorID != "x") {
            $this->db->where("variations.color_id", $params[0]->colorID);
        }
        if ($params[0]->sizeID != "x") {
            $this->db->where("variations.size_id", $params[0]->sizeID);
        }
        if ($params[0]->priceRange != "x") {
            $this->db->where("product.product_price <= ", $params[0]->priceRange);
        }
        if($params[0]->catID > 1){
            if ($params[0]->catType == 0) {
                $this->db->where("product_cat.cat_parent_id", $catID);
            } else {
                $this->db->where("product.cat_id", $catID);
            }
        }
        
        if ($params[0]->search != "x") {
            $this->db->like("product.product_name_geo", $params[0]->search);
        }
        $this->db->group("product.product_id");
        $this->db->limit($this->db->paginationLimit(9));
        if ($params[0]->ord == 1) {
            $this->db->order("product.product_id", "DESC");
        } elseif ($params[0]->ord == "2") {
            $this->db->order("product.product_price", "ASC");
        } elseif ($params[0]->ord == "3") {
            $this->db->order("product.product_price", "DESC");
        }
        $result = $this->db->exec("get");
        return $result;
    }

    public function pagination()
    {
        /**pagination**/
        $result = $this->db->pagination(9);
        return $result;
    }

    public function searchProduct()
    {
        $this->db->select(product_name, "product_id");
        $this->db->from("product");
        $this->db->where("product_status", 1);
        //$this->db->like(product_name, $word);
        //$this->db->limit(8);
        $this->db->group("product.product_id");
        $this->db->order(product_name);
        $result = $this->db->exec("get");
        return $result;
    }

    public function trendingProduct()
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id", "product.cat_id");
        $this->db->join_method("inner");
        $this->db->where("product_cat.cat_status", 1);
        $this->db->where("product.product_status", 1);
        $this->db->limit(8);
        $this->db->group("product.product_id");
        $this->db->order("RAND()");
        $result = $this->db->exec("get");
        return $result;
    }

    public function productNewArrival()
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id", "product.cat_id");
        $this->db->join_method("inner");
        $this->db->where("product_cat.cat_status", 1);
        $this->db->where("product.product_status", 1);
        $this->db->limit(3);
        $this->db->group("product.product_id");
        $this->db->order("product.product_id", "DESC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function productBestSellers()
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id", "product.cat_id");
        $this->db->join_method("inner");
        $this->db->where("product_cat.cat_status", 1);
        $this->db->where("product.product_status", 1);
        $this->db->limit(3);
        $this->db->group("product.product_id");
        $this->db->order("RAND()");
        $result = $this->db->exec("get");
        return $result;
    }

    public function productTopRated()
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id", "product.cat_id");
        $this->db->join_method("inner");
        $this->db->where("product.product_status", 1);
        $this->db->limit(3);
        $this->db->group("product.product_id");
        $this->db->order("RAND()");
        $result = $this->db->exec("get");
        return $result;
    }

    public function productSpecialOffer()
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id", "product.cat_id");
        $this->db->join_method("inner");
        $this->db->where("product_cat.cat_status", 1);
        $this->db->where("product.product_status", 1);
        $this->db->where("product.product_sale > ", 0);
        $this->db->limit(3);
        $this->db->group("product.product_id");
        $this->db->order("RAND()");
        $result = $this->db->exec("get");
        return $result;
    }

    public function productBestSale()
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id", "product.cat_id");
        $this->db->join_method("inner");
        $this->db->where("product_cat.cat_status", 1);
        $this->db->where("product.product_status", 1);
        $this->db->where("product.product_sale > ", 0);
        $this->db->limit(1);
        $this->db->group("product.product_id");
        $this->db->order("product_sale", "DESC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function bannerProduct()
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("brands");
        $this->db->join_where("brands.brand_id", "product.brand_id");
        $this->db->join_method("inner");
        $this->db->where("product.product_status", 1);
        $this->db->limit(2);
        $this->db->group("product.product_id");
        $this->db->order("views", "DESC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function brandList(): string
    {
        $this->db->select("*");
        $this->db->from("brands");
        $result = $this->db->exec("get");
        return $result;
    }

    public function productWishlist(int $productID): string
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("brands");
        $this->db->join_where("brands.brand_id", "product.brand_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id", "product.cat_id");
        $this->db->join_method("inner");
        $this->db->where("product_cat.cat_status", 1);
        $this->db->where("product.product_status", 1);
        $this->db->where("product.product_id", $productID);
        $this->db->group("product.product_id");
        $this->db->order("views", "DESC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function productDetails(int $productID): string
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("brands");
        $this->db->join_where("brands.brand_id", "product.brand_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id", "product.cat_id");
        $this->db->join_method("inner");
        //$this->db->where("product_cat.cat_status", 1);
        $this->db->where("product.product_status", 1);
        $this->db->where("product.product_id", $productID);
        $this->db->order("views", "DESC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function variationList($productID)
    {
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("variations");
        $this->db->join_table("color_options");
        $this->db->join_where("color_options.color_id", "variations.color_id");
        $this->db->join_method("inner");
        $this->db->where("variations.product_id", $productID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function variationGet($productID, $colorID)
    {
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("variations");
        $this->db->join_table("color_options");
        $this->db->join_where("color_options.color_id", "variations.color_id");
        $this->db->join_method("inner");
        $this->db->join_table("size_options");
        $this->db->join_where("size_options.size_id", "variations.size_id");
        $this->db->join_method("inner");
        $this->db->where("variations.product_id", $productID);
        $this->db->where("variations.color_id", $colorID);
        $result = $this->db->get("get");
        return $result;
    }

    public function variationByID($variationID)
    {
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("variations");
        $this->db->where("variations.variation_id", $variationID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function variationByOPT($productID, $colorID, $sizeID)
    {
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("variations");
        $this->db->where("variations.product_id", $productID);
        $this->db->where("variations.color_id", $colorID);
        $this->db->where("variations.size_id", $sizeID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function colorList()
    {
        $this->db->select("*");
        $this->db->from("color_options");
        $result = $this->db->exec("get");
        return $result;
    }

    public function colorPhotos($productID)
    {
        $this->db->select("*");
        $this->db->from("color_options");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.color_id", "color_options.color_id");
        $this->db->join_method("inner");
        $this->db->where("product_photos.product_id", $productID);
        $this->db->group("color_options.color_id");
        $result = $this->db->exec("get");
        return $result;
    }

    public function photoList($productID, $colorID)
    {
        $this->db->select("*");
        $this->db->from("product_photos");
        $this->db->where("product_id", $productID);
        $this->db->where("color_id", $colorID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function sizeList($sizeID)
    {
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("size_options");
        $this->db->where("size_id", $sizeID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function sizes()
    {
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("size_options");
        $result = $this->db->exec("get");
        return $result;
    }

    public function variationForCart($variationID)
    {
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("variations");
        $this->db->join_table("product");
        $this->db->join_where("product.product_id", "variations.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("color_options");
        $this->db->join_where("color_options.color_id", "variations.color_id");
        $this->db->join_method("inner");
        $this->db->join_table("size_options");
        $this->db->join_where("size_options.size_id", "variations.size_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "variations.product_id");
        $this->db->join_method("inner");
        $this->db->where("product.product_status", 1);
        $this->db->where("variations.variation_id", $variationID);
        $this->db->limit(1);
        $result = $this->db->exec("get");
        return $result;
    }

    public function productLike(int $productID, string $comboCode): string
    {
        $this->db->select("*");
        $this->db->from("combo_list");
        $this->db->join_table("product");
        $this->db->join_where("product.product_id", "combo_list.product_id");
        $this->db->join_method("left");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id", "product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("brands");
        $this->db->join_where("brands.brand_id", "product.brand_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id", "product.cat_id");
        $this->db->join_method("inner");
        //$this->db->where("product_cat.cat_status", 1);
        $this->db->where("product.product_status", 1);
        $this->db->where("product.product_id <>", $productID);
        $this->db->where("combo_list.combo_code", $comboCode);
        $this->db->group("product.product_id");
        $this->db->order("views", "DESC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function comboByProductID($productID)
    {
        $this->db->select("*");
        $this->db->from("combo_list");
        $this->db->where("product_id", $productID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function getCupon($cuponCode)
    {
        $this->db->select("*");
        $this->db->from("cupons");
        $this->db->where("cupon_code", $cuponCode);
        $result = $this->db->exec("get");
        return $result;
    }

    public function checkCupon($cuponCode)
    {
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->where("cupon_code", $cuponCode);
        $result = $this->db->exec("get");
        return $result;
    }

    public function product_tree()
    {
        $this->db->select("*");
        $this->db->from("product_cat");
        $this->db->where("product_cat.cat_status", 1);
        $this->db->treeCatID = "cat_id";
        $this->db->treeParentID = "cat_parent_id";
        $this->db->treeName = cat_name;
        $this->db->treeUrl = "/shop/";
        $result = $this->db->menu_tree();
        return $result;
    }

    public function productTreeByID($catID)
    {
        $this->db->select("*");
        $this->db->from("product_cat");
        $this->db->where("product_cat.cat_status", 1);
        $this->db->treeCatID = "cat_id";
        $this->db->treeParentID = "cat_parent_id";
        $this->db->treeName = cat_name;
        $this->db->treeUrl = "/shop/";
        $result = $this->db->menu_tree($catID);
        return $result;
    }

    /* Shopping Cart */
    public function checkCart($userID)
    {
        $this->db->select("*");
        $this->db->from("shopping_cart");
        $this->db->where("user_id", $userID);
        $result = $this->db->exec("get");
        return $result;
    }
    public function updateCart($userID, $data)
    {
        /*Update*/
        $this->db->table("shopping_cart");
        $this->db->columns("data");
        $this->db->values($data);
        $this->db->where("user_id", $userID);
        $this->db->exec("update");
    }

    public function inserCart($userID, $data)
    {
        /*Insert*/
        $this->db->table("shopping_cart");
        $this->db->columns("user_id", "data");
        $this->db->values($userID, $data);
        $this->db->exec("insert");
    }

    /* Wishlist */
    public function checkWishlist($userID)
    {
        $this->db->select("*");
        $this->db->from("wishlist");
        $this->db->where("user_id", $userID);
        $result = $this->db->exec("get");
        return $result;
    }
    public function updateWishlist($userID, $data)
    {
        /*Update*/
        $this->db->table("wishlist");
        $this->db->columns("data");
        $this->db->values($data);
        $this->db->where("user_id", $userID);
        $this->db->exec("update");
    }

    public function inserWishlist($userID, $data)
    {
        /*Insert*/
        $this->db->table("wishlist");
        $this->db->columns("user_id", "data");
        $this->db->values($userID, $data);
        $this->db->exec("insert");
    }

    public function insertOrder($userID, $productID, $variationID, $productNameGeo, $productNameEng, $productNameRus, $productPrice, $productSale, $shippingCompanyID, $orderCode, $status, $cuponCode, $trackingCode, $orderDate, $colorNameGeo, $colorNameEng, $colorNameRus, $sizeName, $quantity, $image)
    {
        /*Insert*/
        $this->db->table("orders");
        $this->db->columns("user_id", "product_id", "variation_id", "product_name_geo", "product_name_eng", "product_name_rus", "product_price", "product_sale", "shipping_company_id", "order_code", "status", "cupon_code", "tracking_code", "order_date", "color_name_geo", "color_name_eng", "color_name_rus", "size_name", "quantity", "image");
        $this->db->values($userID, $productID, $variationID, $productNameGeo, $productNameEng, $productNameRus, $productPrice, $productSale, $shippingCompanyID, $orderCode, $status, $cuponCode, $trackingCode, $orderDate, $colorNameGeo, $colorNameEng, $colorNameRus, $sizeName, $quantity, $image);
        $this->db->exec("insert");
    }

    public function updateOrder($paymentHash, $status)
    {
        $this->db->table("orders");
        $this->db->columns("status");
        $this->db->values($status);
        $this->db->where("order_code", $paymentHash);
    }

    /** PAYMENTS **/
    public function addPayOrder($orderID, $paymentHash, $userID, $amount, $paymentDate)
    {
        /*Insert*/
        $this->db->table("payments");
        $this->db->columns("pay_order_id", "payment_hash", "user_id", "amount", "payment_date");
        $this->db->values($orderID, $paymentHash, $userID, $amount, $paymentDate);
        $this->db->exec("insert");
    }

    public function updatePayOrder($orderID, $paymentHash)
    {
        /*Insert*/
        $this->db->table("payments");
        $this->db->columns("status", 1);
        $this->db->values($orderID, $paymentHash);
        $this->db->where("pay_order_id", $orderID);
        $this->db->where("payment_hash", $paymentHash);
        $this->db->exec("insert");
    }

    public function paymentByParams($orderID, $paymentHash)
    {
        $this->db->select("*");
        $this->db->from("payments");
        $this->db->where("order_id", $orderID);
        $this->db->where("payment_hash", $paymentHash);
        $result = $this->db->exec("get");
        return $result;
    }
    public function paymentsByUserID($userID)
    {
        $this->db->select("*");
        $this->db->from("payments");
        $this->db->where("user_id", $userID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function contact()
    {
        $this->db->select("*");
        $this->db->from("contact");
        $this->db->limit(1);
        $result = $this->db->exec("get");
        return $result;
    }
}
