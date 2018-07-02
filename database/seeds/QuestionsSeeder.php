<?php

use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = \Carbon::now();
    	\DB::select("INSERT INTO `questions` (`id`, `question`, `sex`, `created_at`, `updated_at`, `deleted_at`) VALUES
    		(1, 'Se siente bien hoy', 'T', '$now', '$now', NULL),
    		(2, 'Ingirió alimento en las últimas 6 horas', 'T', '$now', '$now', NULL),
    		(3, 'Ha donado sangre anteriormente', 'T', '$now', '$now', NULL),
    		(4, 'Ha sido rechazado alguna vez como donante', 'T', '$now', '$now', NULL),
    		(5, 'Tuvo alguna reacción durante o después de la donación', 'T', '$now', '$now', NULL),
    		(6, 'Conoció los resultados de los exámenes en ocasión de la donación', 'T', '$now', '$now', NULL),
    		(7, 'Ha tenido diarrea, gripe o fiebre en la última semana', 'T', '$now', '$now', NULL),
    		(8, 'Ha estado en control médico por alguna enfermedad importante', 'T', '$now', '$now', NULL),
    		(9, 'Ha sido sometido a cirugía alguna vez', 'T', '$now', '$now', NULL),
    		(10, 'Ha sido sometido a cirugía odontológica alguna vez', 'T', '$now', '$now', NULL),
    		(11, 'Ha recibido transfusiones de sangre', 'T', '$now', '$now', NULL),
    		(12, 'Ha tenido paludismo alguna vez', 'T', '$now', '$now', NULL),
    		(13, 'Ha estado en área palúdica en los últimos 6 meses', 'T', '$now', '$now', NULL),
    		(14, 'Ha padecido de alguna  de las enfermedades que a continuación se mencionan: Hipertensión Arterial, Diabetes, Tuberculosis, Cáncer, Enfermedades en la piel, Convulsiones, Epilepsia, enfermedades del Corazón', 'T', '$now', '$now', NULL),
    		(15, 'Ha tenido Hepatitis, Orina Oscura o Piel Amarilla alguna vez', 'T', '$now', '$now', NULL),
    		(16, 'Ha tenido contacto estrecho o relación sexuales con alguien con Hepatitis', 'T', '$now', '$now', NULL),
    		(17, 'Tienes Tatuajes, Pircings; etc. en el cuerpo', 'T', '$now', '$now', NULL),
    		(18, 'Ha Recibido Hormonas de Crecimiento de origen Humano alguna vez', 'T', '$now', '$now', NULL),
    		(19, 'Ha tenido familiares con enfermedades Creutzfeldt-Jacob', 'T', '$now', '$now', NULL),
    		(20, 'Ha recibido trasplante de córnea o duramadre', 'T', '$now', '$now', NULL),
    		(21, 'Está tomando algún tipo de medicamento actualmente', 'T', '$now', '$now', NULL),
    		(22, 'Ha tomado aspirina en los últimos 3 días', 'T', '$now', '$now', NULL),
    		(23, 'Ha sido picado por un chipo o habitado en vivienda rural endémicas para enfermedad de Chagas', 'T', '$now', '$now', NULL),
    		(24, 'Ha recibido Vacunaciones en el ultimo año', 'T', '$now', '$now', NULL),
    		(25, 'Ha tenido Ud. Relación sexual con  hombres, aunque sea una sola vez', 'M', '$now', '$now', NULL),
    		(26, 'Ha tenido Ud. Relación sexual con prostitutas en los últimos 12 meses', 'M', '$now', '$now', NULL),
    		(27, 'Ha tenido Ud. Relaciones Sexuales con un hombre bisexual, aunque sea una sola vez', 'F', '$now', '$now', NULL),
    		(28, 'Esta Ud. Embarazada, o ha tenido aborto, parto o cesárea en el último mes y medio', 'F', '$now', '$now', NULL),
    		(29, 'Ha usado algún tipo de Droga, aunque sea una sola vez', 'T', '$now', '$now', NULL),
    		(30, 'Ha tenido Ud. Alguna vez una prueba Positiva para lSIDA o HEPATITIS', 'T', '$now', '$now', NULL),
    		(31, 'Ha tenido Ud. alguna vez enfermedades de transmisión sexual: Sífilis, Gonorrea', 'T', '$now', '$now', NULL),
    		(32, 'Ha tenido Ud. Relaciones sexual aunque sea una sola vez, con alguien que tenga una prueba  para SIDA POSITIVA.', 'T', '$now', '$now', NULL),
    		(33, 'Se considera Ud. Dentro de Algunos de  los siguientes Grupos de Riesgo para SIDA: Promiscuo, Prostitutas, Bisexuales, Homosexuales, Drogadictos, Hemofílicos', 'T', '$now', '$now', NULL),
    		(34, 'Ha estado Ud. Encarcelado por más de 3 Días en los últimos 12 meses', 'T', '$now', '$now', NULL),
    		(35, 'Ha intercambiado Ud. Alguna Vez Sexo por Drogas o por Dinero', 'T', '$now', '$now', NULL),
    		(36, 'El Virus de SIDA puede ser Transmitido a Través de Sangre Contaminada, cree Ud. Que su sangre es segura para ser usada para Transfusiones', 'T', '$now', '$now', NULL),
    		(37, 'Ha entendido Todas las preguntas anteriores', 'T', '$now', '$now', NULL);");
}
}
