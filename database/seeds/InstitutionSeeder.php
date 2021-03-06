<?php

use Illuminate\Database\Seeder;

use App\Institution;
use Faker\Factory  as Faker;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $array = [
            'Academia Maddox'
            ,'Bachillerato Anáhuac Xalapa'
            ,'Coelgio Everest Zacatecas'
            ,'Colegio CECVAC'
            ,'Colegio CEYCA Bachillerato'
            ,'Colegio del Boque Puebla '
            ,'Colegio del Bosque México'
            ,'Colegio del Bosque San Luis Potosí'
            ,'Colegio Everest México'
            ,'Colegio Highlands Monterrey'
            ,'Colegio Highlands San Salvador'
            ,'Colegio Himalaya Monterrey'
            ,'Colegio Oxford Bachillerato'
            ,'Insituto Cumbres del Bosque León'
            ,'Instittuo Cumbres Cozumel'
            ,'Instituto Alpes  Cumbres Guadalajara'
            ,'Instituto Alpes Aguascalientes'
            ,'Instituto Alpes San Javier'
            ,'Instituto Andes Culiacan'
            ,'Instituto Andes Los Mochis'
            ,'Instituto Andes Puebla'
            ,'Instituto Andes San Luis Potosí'
            ,'Instituto Andes Tuxtla'
            ,'Instituto Cumbres  Durango'
            ,'Instituto Cumbres Aguascalientes'
            ,'Instituto Cumbres Bosques'
            ,'Instituto Cumbres Campeche'
            ,'Instituto Cumbres Cancún'
            ,'Instituto Cumbres Celaya'
            ,'Instituto Cumbres Chetumal'
            ,'Instituto Cumbres Cuernavaca'
            ,'Instituto Cumbres Godwin Mérida'
            ,'Instituto Cumbres Irapuato'
            ,'Instituto Cumbres Lomas'
            ,'Instituto Cumbres México'
            ,'Instituto Cumbres Monclova'
            ,'Instituto Cumbres Morelia'
            ,'Instituto Cumbres Oaxaca'
            ,'Instituto Cumbres San Javier'
            ,'Instituto Cumbres Tapachula'
            ,'Instituto Cumbres Tijuana'
            ,'Instituto Cumbres Toluca'
            ,'Instituto Cumbres Veracruz'
            ,'Instituto Cumbres Villahermosa'
            ,'Instituto Cumbres y Alpes Piedras Negras'
            ,'Instituto Cumbres y Alpes Querétaro'
            ,'Instituto Cumbres y Alpes Saltillo'
            ,'Instituto Cumbres y Alpes Torreón'
            ,'Instituto Everest Chihuahua'
            ,'Instituto Godwin México'
            ,'Instituto Highlands Pedregal'
            ,'Instituto Irlándes Hermosillo'
            ,'Instituto Irlandés Nuevo Laredo'
            ,'Instituto Kilimanjaro Monterrey'
            ,'Instituto Oxford'
            ,'Instituto Rosedal Lomas'
            ,'Instituto Rosedal Vista Hermosa'
            ,'Irish Institute Femenino'
            ,'Irish Institute Masculino'
            ,'Irish Institute Monterrey'
            ,'Pinecrest Institute'
        ];

        foreach($array as $d){
            Institution::create([
                'name'          => $d,
                'user_id'       => 1,
                'mas'           =>$faker->randomElement([0,1]),
                'fem'           =>$faker->randomElement([0,1]),
                'mix'           =>$faker->randomElement([0,1]),
                'active'        =>$faker->randomElement([0,1]),
                'country_id'    =>$faker->randomElement([32,76,152,188,218,222,320,340,484,558,591,600,604,620,724,840,858,859]),
                'state_id'      =>$faker->randomElement([50,33,34,43,39,44,47,42,37,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,38,36,40,49,35,48,41]),
                'city_id'       =>$faker->randomElement([
                    1,11, 10,7,4,8,9,6,2,3,5,2,3,4,5,1,3,8,1,9,2,2,3,7,11,9,4,6,10,8,5,1,30,4,15,26,8,31,1,5,10,18,6,27,11,25,22,2,20,14,38,19,3,37,12,13,28,32,35,17,36,23,21,34,7,16,29,33,9,24,2,9,7,1,4,3,5,6,8,10,101,79,12,61,86,27,63,78,23,44,111,2,28,110,94,7,24,64,38,93,56,74,48,68,88,62,33,43,84,45,92,21,29,18,67,90,60,25,5,39,42,91,73,72,47,13,85,112,76,81,118,14,22,49,119,26,113,66,82,77,
                    96,100,109, 31,59,114,116, 65,50,16,19,104,30,11,34, 99,41,115,52,4,106,98,58, 75,20,8,117,83,17,46,9, 108,97,107,69, 51,3,1,32,71,40,54,37, 103,89,87,35,55,102,105,15, 57,53,6,10,36,70,80, 19,17,54,4,6,31, 50,5, 35, 13, 23, 10, 25, 34, 40, 48, 63, 43, 37, 28, 53, 1, 15, 52, 2, 38, 42, 21, 55, 45, 22, 61, 57, 49, 27, 9, 18, 26, 24, 12, 66, 51, 47, 20, 41, 30, 8, 65,46,
                    29, 59, 56, 33, 64, 7, 60, 11, 62, 67, 16, 58, 32, 3,39, 44, 36, 14, 10, 2, 14, 3, 4, 15, 5, 6, 7, 8, 16, 9, 11, 12, 17, 13, 5, 1, 39, 3, 28, 2, 37, 34, 32, 19, 26, 8, 21, 20, 22, 16, 38, 33, 23, 14, 7, 12, 13, 36, 10, 17, 9, 25, 11, 30, 35, 18, 15, 29, 24, 4, 31, 27, 6, 15, 37, 26, 31, 25, 8, 17, 27, 24, 23, 12, 1, 16, 20, 30, 22, 3, 14, 29, 33, 43, 45, 6, 34, 13, 40, 32, 7, 5, 9, 35, 44, 11, 42, 18, 4, 19, 10, 2, 39, 38, 21, 28, 46, 36, 41, 29, 32, 40, 61, 12, 44, 51, 56, 1, 39, 53, 35, 34, 59, 75, 55, 15, 60, 49, 58, 37, 47, 31, 7, 6, 26, 17, 67, 27, 50, 64, 22, 3, 73, 54, 68, 48, 16, 38, 57, 11, 14, 21, 45, 8, 19, 24, 28, 79, 2, 74, 42, 33, 70, 5, 66, 65, 69, 72, 76, 10, 20, 41, 81, 63, 9, 52, 43, 78, 4, 46, 62, 71, 30, 25, 18, 13, 80, 77, 23, 36, 48, 38, 39, 5, 52, 51, 82, 31, 49, 47, 40, 18, 30, 84, 43, 15, 58, 6, 29, 59, 44, 3, 55, 54, 23, 9, 41, 50, 19, 67, 70, 76, 63, 17, 64, 65, 74, 10, 13, 28, 46, 32, 25, 11, 26, 80, 78, 42, 62, 34, 73, 71, 33, 81, 14, 79, 68, 12, 20, 37, 36, 35, 27, 53, 4, 60, 24, 1, 45, 22, 77, 2, 16, 56, 57, 69, 83, 75, 66, 8, 72, 7, 21, 61, 39, 120, 71, 45, 83, 9, 5, 101, 124, 1, 29, 98, 97, 70, 2, 114, 119, 10, 50, 44, 51, 30, 66, 123, 42, 61, 115, 19, 104, 25, 81, 41, 31, 76, 94, 40, 55, 36, 75, 7, 6, 3, 95, 77, 38, 62, 58, 80, 73, 46, 78, 74, 8, 125, 91, 116, 35, 118, 60, 117, 111, 53, 64, 109, 72, 93, 105, 13, 63, 47, 18, 16, 48, 33, 110, 17, 12, 28, 11, 84, 67, 20, 100, 24, 88, 90, 52, 32, 34, 54, 37, 102, 106, 68, 43, 15,
                    21, 27, 22, 23, 79, 26, 14, 89, 92, 82, 86, 4, 96, 107, 57, 59, 112, 69, 121, 85, 113, 99, 122, 108, 103, 65, 87, 49, 56, 106, 1, 3, 85, 14, 102, 56, 64, 74, 124, 48, 42, 47, 87, 5, 114, 111,
                    32, 41, 78, 66, 116, 110,7, 86, 118, 82, 123, 77, 8, 105, 80, 97, 21, 113, 117, 4, 40, 107, 119, 51, 115, 67, 76, 54, 55, 18, 27, 73, 90, 72, 49, 88, 52, 63, 12, 6, 98, 101, 43, 19, 62, 37, 13, 57, 104, 71, 45, 79, 112, 26, 60, 38, 46, 95, 23, 35, 121,91, 24, 53, 109, 108, 33, 120, 96, 10, 36, 20, 81, 44, 125, 59, 92, 75, 2, 65, 16, 61, 84, 100, 28, 69, 93, 99, 30, 11, 31, 29, 70, 39, 25, 122, 83, 22, 103, 17, 89, 68, 50, 94, 9, 15, 34, 58, 53, 37, 16, 73, 100, 48, 1, 49, 71, 113, 4, 63, 107, 94, 70, 44, 54, 36, 20, 27, 18, 88, 78, 3, 110, 40, 72, 76, 11, 74, 103, 62, 105, 86, 106, 42, 69, 60, 28, 109, 67, 51, 45, 104, 23, 108, 30, 85, 25, 43, 84, 19, 95, 91, 102, 21, 65, 24, 56, 90, 75, 68, 83, 58, 12, 89, 2, 6, 64, 14, 26, 15, 8, 96, 10, 52, 31, 17, 93, 34, 50, 41, 80, 22, 10, 92, 7, 5, 98, 61, 47, 112, 99, 46, 81, 66, 32, 39, 82, 97, 111, 87, 33, 59, 55, 79, 9, 35, 29, 57, 13, 38, 77, 7, 9, 20, 23, 26, 11, 18, 15, 5, 21, 14, 1, 17, 4, 29, 6, 8, 24, 31, 28, 22, 30, 27, 2, 16, 33, 32, 12, 19, 13, 3, 10, 25, 17, 18, 15, 1, 16, 5, 9, 19, 11, 10, 4, 20, 12, 8, 13, 14, 7, 2, 6, 3, 39, 5, 32, 37, 8, 44, 51, 50, 40, 45, 12, 47, 1, 28, 25, 2, 23, 11, 35, 18, 21, 48, 19, 46, 10, 6, 41, 34, 16, 42, 27, 3, 15, 20, 13, 26, 31, 49, 4, 22, 9, 38, 43, 33, 30, 17, 29, 14, 7, 24, 36, 67, 338, 175, 161, 179, 150, 487, 294, 193, 45, 483, 178, 77, 63, 102, 84, 539, 531, 33, 293, 135, 227, 426, 494, 553, 157, 91, 87, 519, 409, 184, 44, 169, 21, 2, 278, 9, 309, 166, 134, 417, 232, 559, 136, 41, 406, 354, 228, 142, 322, 374, 29, 490, 545, 434, 244, 163, 396, 40, 187, 234, 109, 171, 249, 116, 58, 206, 431, 416, 177, 24, 355, 27, 330, 276, 438, 98, 139, 19, 527, 182, 425, 220, 326, 558, 313, 436, 311, 478, 62, 214, 336, 458, 1, 296, 42, 173, 335, 260, 544, 359, 196, 419, 267, 191, 247, 504, 496, 35, 363, 288, 365, 262, 443, 473, 156, 457, 222, 471, 223, 280, 541, 201, 128, 432, 514, 442, 97, 216, 257, 100, 120, 114, 503, 38, 138, 246, 303, 522, 299, 460, 468, 205, 498, 212, 189, 39, 459, 22, 340, 181, 373, 476, 160, 568, 89, 456, 4, 400, 462, 484, 186, 567, 199, 290, 34, 99, 259, 251, 183, 549, 32, 455, 165, 245, 261, 55, 381, 352, 237, 164, 529, 520, 524, 176, 548, 18, 464, 552, 151, 47, 256, 283, 287, 488, 129, 422, 537, 501, 230, 81, 11, 376, 65, 152, 461, 339, 556, 540, 321, 547, 106, 486, 521, 405, 105, 93, 341, 221, 121, 499, 346, 518, 423, 536, 332, 479, 6, 270, 264, 395, 451, 404, 304, 463, 523, 96, 224, 215, 493, 140, 250, 569, 469, 286, 348, 528, 208, 242, 16, 397, 210, 317, 239, 383, 480, 408, 172, 370, 127, 258, 240, 50, 119, 379, 86, 532, 110, 252, 430, 320, 445, 218, 46, 562, 281, 54, 147, 331, 144, 492, 195, 94, 217, 511, 564, 329, 274, 255, 43, 14, 30, 505, 441, 66, 130, 5, 141, 557, 265, 525, 75, 143, 327, 25, 502, 517, 190, 207, 554, 60, 437, 394, 454, 31, 337, 435, 275, 3, 323, 231, 427, 10, 551, 343, 560, 411, 546, 145, 349, 356, 298, 475, 506, 78, 219, 380, 51, 550, 197, 233, 194, 118, 226, 333, 325, 449, 131, 125, 200, 64, 357, 204, 122, 410, 8, 316, 428, 74, 361, 79, 470, 418, 440, 472, 36, 508, 412, 52, 53, 305, 421, 515, 307, 308, 248, 124, 453, 282, 59, 289, 351, 235, 170, 538, 146, 353, 384, 61, 154, 362, 167, 126, 209, 319, 391, 159, 344, 291, 254, 533, 95, 424, 263, 347, 279, 512, 148, 495, 236, 211, 324, 509, 366, 85, 113, 401, 117, 439, 12, 71, 306, 253, 413, 266, 73, 20, 37, 447, 300, 76, 415, 26, 446, 133, 371, 481, 372, 269, 510, 297, 382, 392, 88, 444, 500, 377, 570, 123, 378, 271, 399, 92, 375, 390, 385, 310, 107, 83, 23, 174, 350, 342, 565, 403, 115, 389, 13, 108, 555, 295, 273, 292, 388, 387, 104, 48, 369, 398, 358, 386, 137, 566, 491, 450, 448, 516, 158, 277, 420, 535, 229, 429, 149, 155, 477, 28, 243, 530, 192, 68, 360, 452, 103, 7, 315, 132, 49, 284, 368, 112, 301, 393, 162, 101, 72, 561, 328, 238, 241, 69, 17, 15, 203, 80, 542, 268, 563, 534, 482, 185, 180, 56, 345, 111, 402, 474, 285, 485, 168, 507, 467, 302, 188, 466, 312, 70, 225, 82, 90, 367, 489, 414, 334, 543, 213, 272, 364, 314, 497, 202, 433, 526, 153, 318, 114, 181, 136, 90, 34, 41, 140, 119, 106, 15, 64, 111, 194, 86, 187, 178, 197, 109, 57, 100, 71, 8, 91, 183, 213, 89, 184, 53, 208, 49, 6, 167, 123, 14, 162, 215, 68, 107, 30, 28, 77, 210, 78, 202, 72, 84, 80, 158, 192, 29, 88, 216, 101, 43, 25, 76, 2, 39, 16, 172, 200, 207, 211, 83, 212, 105,94, 174, 186, 204, 75, 173, 17, 54, 199, 44, 170, 132, 180, 134, 143, 122, 48, 74, 60, 26, 138, 19, 102, 126, 125, 188, 175, 148, 69, 121, 166, 85, 22, 5, 33, 165, 185, 168, 176, 51, 21, 159, 133, 201, 62, 7, 31, 146, 52, 206, 169, 160, 87, 73, 47, 32, 198, 56, 81, 11, 191, 157, 42, 147, 24, 59, 9, 139, 155, 113, 66, 82, 37, 196, 190, 3, 127, 141, 112, 135, 55, 117, 128, 108, 137, 67, 179, 93, 58, 116, 50, 163, 1, 104, 96, 152, 4, 142, 65, 12, 130, 164, 40, 153, 97, 151, 193, 150, 95, 131,70, 118, 38, 144, 115, 154, 110, 45, 23, 63, 99, 182, 189, 20, 171, 79, 98, 203, 205, 177, 92, 156, 161, 46,149, 103, 18, 120, 209, 124, 27, 195, 10, 61, 217, 145, 13, 214, 129, 35, 36, 14, 11, 5, 2, 9, 10, 3, 13, 4, 15, 18, 7, 12, 17, 16, 1, 6, 8, 4, 2, 7, 3, 5, 1, 8, 9, 6, 28, 35, 9, 1, 21, 46, 44, 7, 6, 15, 25, 33, 49, 20, 48, 47, 17, 22, 45, 56, 51, 4, 13, 16, 40, 10, 58, 2, 5, 8, 52, 30, 50, 55, 32, 43, 24, 11, 27, 36, 23, 3, 19, 31, 12, 41, 34, 26, 42, 39, 14, 18, 54, 53, 38, 29, 37, 57, 6, 18, 3, 5, 13, 11, 1, 15, 2, 7, 10, 17, 12, 9, 4, 8, 14, 16, 30, 56, 20, 55, 48, 70, 17, 4, 65, 7, 46, 60, 16, 64, 47, 43, 35, 59, 36, 39, 2, 27, 41, 15, 10, 31, 40, 28, 8, 23, 32, 38, 67, 58, 19, 6, 22, 11, 57, 24, 63, 68, 45, 34, 13, 66, 1, 14, 53, 50, 18, 42, 33, 12, 26, 71, 25, 29, 72, 21, 37, 62, 52, 54, 61, 9, 5, 51, 49, 44, 3, 69, 4, 10, 13, 5, 8, 2, 14, 6, 12, 3, 11, 16, 9, 15, 17, 1, 7, 41, 19, 13, 8, 22, 40, 35, 10, 36, 37, 18, 34, 1, 30, 16, 20, 42, 39, 17, 26, 6, 31, 29, 27, 25, 14, 24, 15, 7, 32, 33, 23, 5, 38, 9, 3, 2, 12, 43, 11, 21, 4, 28, 87, 182, 92, 79, 25, 128, 26, 136, 1, 132, 194, 177, 187, 36, 93, 112, 106, 2, 166, 95, 9, 4, 38, 164, 46, 65, 17, 134, 191, 126, 16, 193, 123, 133, 152, 161, 121, 155, 129, 56, 55, 63, 35, 78, 13, 205, 60, 154, 150, 34, 167, 153, 151, 72, 76, 202, 170, 198, 27, 180, 83, 58, 160, 189, 175, 157, 33, 203, 64, 50, 103, 67, 37, 51, 40, 66, 131, 124, 69, 158, 102, 211, 183, 86, 23, 10, 107, 156, 163, 114, 109, 96, 57, 197, 42, 192, 88, 24, 162, 188, 146, 179, 71, 29, 8, 47, 127, 62, 186, 80, 165, 43, 200, 7, 148, 100, 90, 105, 28, 118, 135, 101, 81, 22, 85, 68, 44, 99, 115, 138, 30, 18, 6, 147, 74, 184, 19, 195, 20,168, 140, 185, 98, 113, 41, 117, 53, 52, 196, 14, 21, 125, 31, 49, 201, 159, 110, 137, 171, 173, 174, 181, 75, 11, 97, 207, 208, 45, 84, 5, 12, 178, 139, 119, 176, 190, 54, 169, 130, 212, 77, 94, 141, 143, 15, 73, 32, 149, 104, 209, 122, 59, 3, 142, 144, 116, 145, 172, 89, 199, 120, 48, 206, 82, 111, 39, 204, 108, 70, 91, 61, 210, 33, 15, 56, 24, 36, 29, 60, 53, 6, 20, 45, 14, 34, 21, 12, 5, 3, 11, 31, 40, 55, 43, 39, 35, 38, 52, 13, 30, 47, 46, 4, 8, 7, 16, 37, 2, 1, 26, 9, 18, 19, 23, 57, 32, 49, 51, 44, 54, 58, 42, 41, 10, 48, 50, 28, 22, 59, 17, 27, 25, 50, 59, 20, 39, 13, 105, 38, 100, 44, 87, 11, 41, 90, 2, 95, 101, 82, 26, 83, 9, 68, 106, 52, 4, 51, 54, 7, 5, 93, 35, 74, 27, 84, 78, 88, 72, 86, 77, 40, 34, 103, 67, 15, 36, 64,
                    37, 29, 28, 57, 65, 6, 70, 12, 31, 97, 60, 30, 42, 71, 80, 69, 96, 61, 32, 85, 8, 91, 17, 21, 92, 43, 14, 81, 19, 102, 99, 48, 63, 55, 23, 45, 76, 1, 33, 53,62, 47, 25, 18, 89, 56, 66, 46, 24, 49, 75, 10, 104, 58, 22, 73, 94, 16, 98, 79, 3, 56, 32, 50, 7, 27, 26, 41, 22, 29, 14, 39, 51, 6, 5, 37, 13, 17, 57, 12, 8, 36, 16, 25, 24, 53, 35, 52, 38, 54, 10, 42, 40, 49, 9, 21, 20, 31, 43, 55, 46, 15, 19, 44, 18, 48, 30,3, 45, 4, 47, 58, 11, 28, 34, 2, 1, 23, 33, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 130, 10, 18, 3, 141, 142, 143, 144, 145, 82, 19, 44, 107, 146, 73, 18, 53, 2, 19, 147, 148, 149, 150, 20, 21, 151, 152, 22, 23, 24, 153, 213, 571, 218, 219, 19, 20, 572, 573, 574, 575, 576, 577, 578, 579, 580, 581, 582, 583, 584, 585, 586, 587, 588, 589, 590, 591, 592, 593, 594, 25, 21, 19, 220, 221, 61,26, 214, 154, 155, 27, 59, 74, 115, 28, 156,29, 30, 2, 157, 158, 159, 12, 160, 161, 162, 45, 31, 11, 11, 85, 60, 571, 12, 116, 127, 68, 69, 54, 20, 32, 222, 34, 55, 6, 46, 33, 163, 34, 56, 164, 35, 61, 128, 165, 13, 21, 10, 36, 129, 47, 37, 130, 38, 131, 595, 39, 223, 596,597, 598, 599
                ]),
            ]);

        }





        /*factory(Institution::class,1000)->create();*/
    }
}
