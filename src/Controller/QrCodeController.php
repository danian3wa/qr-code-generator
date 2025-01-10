<?php

namespace App\Controller;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCodeBundle\Response\QrCodeResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class QrCodeController extends AbstractController
{
    #[Route('/qr-code', name: 'app_qr_code_form')]
    public function form(): Response
    {
        return $this->render('qr_code/form.html.twig');
    }

    #[Route('/qr-code/generate-image', name: 'app_qr_code_generate_image')]
    public function generateImage(Request $request): Response
    {
        $data = $request->request->get('data');
         if (!$data) {
           return $this->redirectToRoute('app_qr_code_form');
        }

        $qrCode = new QrCode($data);

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        return new QrCodeResponse($result);
    }

    #[Route('/qr-code/generate-vcard', name: 'app_qr_code_generate_vcard')]
    public function generateVcard(Request $request): Response
    {
         $data = $request->request->get('data');
         if (!$data) {
           return $this->redirectToRoute('app_qr_code_form');
        }

        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/vcard');
        $response->headers->set('Content-Disposition', 'attachment; filename="contact.vcf"');

        return $response;
    }
}