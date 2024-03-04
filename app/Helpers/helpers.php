<?php

if (!function_exists('getNbrFormationByCat')) {
    function getNbrFormationByCat($id)
    {
        $data = \DB::table('formations')
//        ->select(\DB::raw('CONCAT(firstname, " ", lastname) as username'))
            ->select(\DB::raw('count(*) as nbr_formations'))
            ->where('categorie_id', $id)
            ->where('deleted_at', null)
            ->where('status', 1)
            ->first();

        return $data->nbr_formations;
    }
}

if (!function_exists('existe_categorie')) {
    function existe_categorie($id)
    {
        $data = \DB::table('categories')
//        ->select(\DB::raw('CONCAT(firstname, " ", lastname) as username'))
            ->select(\DB::raw('count(*) as nbr'))
            ->where('id', $id)
            ->where('deleted_at', null)
            ->where('status', 1)
            ->first();
        if ($data->nbr >0 )
            return true;
        else
            return false;
    }
}


if (!function_exists('getNameFormationById')) {
    function getNameFormationById($id)
    {
        $data = \DB::table('formations')
            ->select(\DB::raw('titre'))
            ->where('id', $id)
            ->where('deleted_at', null)
//            ->where('status', 1)
            ->first();

        return $data->titre;
    }
}

if (!function_exists('getCoachById')) {
    function getCoachById($id)
    {
        $data = \DB::table('coaches')
            ->select(\DB::raw('*'))
            ->where('id', $id)
            ->where('deleted_at', null)
            ->where('status', 1)
            ->first();

        return $data;
    }
}

if (!function_exists('geStudentByUSER_Id')) {
    function geStudentByUSER_Id($id_user)
    {
        $data = \DB::table('students')
            ->select(\DB::raw('*'))
            ->where('user_id', $id_user)
            ->where('deleted_at', null)
//            ->where('status', 1)
            ->first();

        return $data;
    }
}

if (!function_exists('getCoachByUSER_Id')) {
    function getCoachByUSER_Id($id)
    {
        $data = \DB::table('coaches')
            ->select(\DB::raw('*'))
            ->where('user_id', $id)
            ->where('deleted_at', null)
//            ->where('status', 1)
            ->first();

        return $data;
    }
}

if (!function_exists('getUserById')) {
    function getUserById($id)
    {
        $data = \DB::table('users')
            ->select(\DB::raw('*'))
            ->where('id', $id)
//            ->where('deleted_at', null)
            ->first();

        return $data;
    }
}

if (!function_exists('getNameCategorieById')) {
    function getNameCategorieById($id)
    {
        $data = \DB::table('categories')
            ->select(\DB::raw('nom'))
            ->where('id', $id)
            ->first();

        return $data->nom;
    }
}

if (!function_exists('test_chours_in_chapitre_ByIdcrs_and_Idchp')) {
    function test_chours_inchapitre_ByIdcrs_and_Idchp($idcours,$idchapitre)
    {
        $data = \DB::table('chapitre_course')
            ->select(\DB::raw('count(*) as nbr'))
            ->where('course_id', $idcours)
            ->where('chapitre_id', $idchapitre)
            ->first();
        if ($data->nbr >0)
        return true;
        else return false;
    }
}

if (!function_exists('test_formation_user_ByIduser_and_Idformation')) {
    function test_formation_user_ByIduser_and_Idformation($id_user,$id_formation)
    {
        $data = \DB::table('formation_user')
            ->select(\DB::raw('count(*) as nbr'))
            ->where('user_id', $id_user)
            ->where('formation_id', $id_formation)
            ->where('validation', 2)
            ->first();
        if ($data->nbr >0)
            return true;
        else return false;
    }
}

if (!function_exists('get_name_formation_ByIdcrs_and_Idchp')) {
    function get_name_formation_ByIdcrs_and_Idchp($idchapitre)
    {
        $data = \DB::table('formations As F')
            ->select(\DB::raw('F.titre'))
            ->join('chapitre_formation As CF','CF.formation_id', '=', 'F.id')

            ->where('CF.chapitre_id', $idchapitre)
            ->first();

        return $data->titre;
    }
}