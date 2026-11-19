<?php

namespace Database\Seeders;

use App\Models\FormConfig;
use Illuminate\Database\Seeder;

class FormConfigSeeder extends Seeder
{
    public function run(): void
    {
        $forms = [
            [
                'form_key' => 'home_cotizacion',
                'name' => 'Cotización de Portada (Home)',
                'title' => 'Cotizá tu Próximo Toyota',
                'subtitle' => 'Dejanos tus datos y un asesor especializado te contactará en menos de 15 minutos con las mejores condiciones comerciales.',
                'button_text' => 'Solicitar Cotización Inmediata',
                'success_message' => '¡Tu solicitud fue enviada con éxito! Un asesor oficial de Consur S.A. te contactará a la brevedad.',
                'notification_emails' => 'ventas@consur.com.py, contacto@consur.com.py',
                'whatsapp_template' => 'Hola Consur S.A., quisiera solicitar una cotización personalizada y conocer los planes de financiación.',
                'is_active' => true,
            ],
            [
                'form_key' => 'vehicle_detail',
                'name' => 'Ficha Vehicular & Financiación (Detalle)',
                'title' => 'Consultar por este Vehículo',
                'subtitle' => 'Recibí información sobre financiación propia o bancaria, disponibilidad de stock y agendamiento.',
                'button_text' => 'Enviar Solicitud Comercial',
                'success_message' => '¡Solicitud recibida! Un asesor de ventas se comunicará contigo de inmediato.',
                'notification_emails' => 'ventas@consur.com.py',
                'whatsapp_template' => 'Hola Consur S.A., estoy viendo la unidad {vehicle_title} (ID #{vehicle_id}) por US$ {price} y me gustaría recibir asesoramiento.',
                'is_active' => true,
            ],
            [
                'form_key' => 'test_drive',
                'name' => 'Solicitud de Test Drive Oficial',
                'title' => 'Agendá tu Prueba de Manejo',
                'subtitle' => 'Comprobá la potencia, confort y tecnología de la línea Toyota coordinando un test drive exclusivo.',
                'button_text' => 'Confirmar Solicitud de Test Drive',
                'success_message' => '¡Test drive agendado! Un representante se comunicará para coordinar el horario y sucursal.',
                'notification_emails' => 'testdrive@consur.com.py, ventas@consur.com.py',
                'whatsapp_template' => 'Hola Consur S.A., quisiera agendar un Test Drive oficial para probar un Toyota.',
                'is_active' => true,
            ],
            [
                'form_key' => 'usado_entrega',
                'name' => 'Tasación de Usado en Parte de Pago',
                'title' => 'Recibimos tu Usado como Entrega',
                'subtitle' => 'Tasamos tu vehículo usado de cualquier marca al mejor valor del mercado para que te lleves tu Toyota.',
                'button_text' => 'Solicitar Tasación de mi Usado',
                'success_message' => '¡Datos de tu usado recibidos! Nuestro equipo de peritaje te enviará la tasación estimada.',
                'notification_emails' => 'tasaciones@consur.com.py, usados@consur.com.py',
                'whatsapp_template' => 'Hola Consur S.A., quisiera tasar mi vehículo usado para entregarlo como parte de pago.',
                'is_active' => true,
            ],
        ];

        foreach ($forms as $form) {
            FormConfig::updateOrCreate(['form_key' => $form['form_key']], $form);
        }
    }
}
