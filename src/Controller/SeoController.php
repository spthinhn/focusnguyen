<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\View\View;
use Cake\View\Helper\HtmlHelper;
use Cake\Event\Event;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class SeoController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function beforeFilter(Event $event)
    {
    	
    }

    public function index()
    {
        $this->viewBuilder()->layout('default');
    }

    public function checkurl()
    {	
    	$temp = array(
    		'jquery.fileupload-image.js',
    		'jquery.fileupload-audio.js',
    		'jquery.fileupload-video.js',
    		'datatables.min.css',
    		'jquery.fileupload-validate.js',
            'jquery.dataTables.min.js',
            'dataTables.bootstrap.min.js',
            'dataTables.responsive.min.js',
            'responsive.bootstrap.min.js',
            'dataTables.bootstrap.min.css',
            'responsive.bootstrap.min.css',
            'datatables.min.js'
            );
        $csss = array(
            'jquery.fileupload.css'
            );
        $jss = array(
            
    		'jquery.ui.widget.js',
    		'load-image.all.min.js',
    		'canvas-to-blob.min.js',
    		'jquery.iframe-transport.js',
    		'jquery.fileupload.js',
            'jquery.fileupload-process.js',
    		'paging.js',
    		'custom.js',
    		);
    	$this->set('csss', $csss);
    	$this->set('jsss', $jss);

    }

    public function downloadFileCSV()
    {
        $file = WWW_ROOT.'/files/csv/format/formatCSV.csv';
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="formatCSV.csv"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
        }
        exit();
    }

}
