<?php
namespace Phppot;

class Member
{

    private $db;

    private $userTbl;

    function __construct()
    {
        require_once __DIR__ . '/DataSource.php';
        $this->db = new DataSource();
    }

    function isExists($twitterOauthId)
    {
        $query = "SELECT * FROM tbl_member WHERE oauth_id = ?";
        $paramType = "s";
        $paramArray = array(
            $twitterOauthId
        );
        $result = $this->db->select($query, $paramType, $paramArray);
        return $result;
    }

    function insertMember($oauthId, $fullName, $screenName, $photoUrl)
    {
        $query = "INSERT INTO tbl_member (oauth_id, oauth_provider, full_name, screen_name, photo_url) values (?,?,?,?,?)";
        $paramType = "sssss";
        $paramArray = array(
            $oauthId,
            'twitter',
            $fullName,
            $screenName,
            $photoUrl
        );
        $this->db->insert($query, $paramType, $paramArray);
    }

    function getUserById($id)
    {
        $query = "SELECT * FROM tbl_member WHERE id = ?";
        $paramType = "i";
        $paramArray = array(
            $id
        );
        $result = $this->db->select($query, $paramType, $paramArray);
        return $result;
    }
}
