<?php
/**
 * Created by PhpStorm.
 * User: wabap2-14
 * Date: 05/01/18
 * Time: 09:54
 * à remove dans Go to Settings -> Editor -> File and Code Templates -> Includes (TAB) -> PHP File Header
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;



class MemberController extends Controller
{
    const MEMBERS = [
        ["firstname" => "albert", "lastname" => "A"],
        ["firstname" => "ben", "lastname" => "B"],
        ["firstname" => "caro", "lastname" => "C"],
        ["firstname" => "dan", "lastname" => "D"],
        ["firstname" => "eric", "lastname" => "E"],
    ];



    /**
     * @Route(
     *     "/member",
     *     name="member.index",
     * )
     */
    public function indexAction():Response
    {

        return $this->render('member/index.html.twig', [
            'foo' => 'bar',
            'members' => self::MEMBERS,

        ]);
    }

    /**
     * @Route(
     *     "/member/{memberId}",
     *     name="member.details",
     *     requirements={"memberId" = "\d+"},
     *     defaults={"memberId" = 0}
     * )
     */

    public function detailsAction($memberId):Response
    {
        return $this->render('member/details.html.twig',
            ["membersname" => self::MEMBERS[$memberId], 'member_id' => $memberId ]
        );
    }

    /**
     * @Route(
     *     "/member/{memberId}/{adj}",
     *     name="member.adj",
     *     requirements={"memberId" = "\d+", "adj" = "[a-z]+"}
     * )
     */

    public function adjAction($memberId, $adj):Response
    {
        return $this->render('member/blabla.html.twig',
            [
                "members" => self::MEMBERS[$memberId],
                'member_id' => $memberId,
                "adj" => $adj
            ]
        );
    }
}