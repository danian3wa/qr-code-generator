<?php

namespace App\Controller;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter; // Sau alt writerdroid\QrCode\Builder\BuilderInterface;
use Endroid\QrCodeBundle\Response\QrCodeResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class QrCodeController extends AbstractController
{
    #[Route('/qr-code', name: 'app_qr_code_form')]
    public function form(): Response
    {
        return $this->render('qr_code/form.html.twig');
    }

    #[Route('/qr-code/generate', name: 'app_qr_code_generate')]
    public function generate(Request $request): Response
    {
        $data = $request->request->get('data');
        if (!$data) {
           return $this->redirectToRoute('app_qr_code_form');
        }

        $qrCode = new QrCode($data);  // Margine

        $writer = new PngWriter(); // Sau alt writer,  e.g., SvgWriter()
        $result = $writer->write($qrCode);

        return new QrCodeResponse($result);

    }

}