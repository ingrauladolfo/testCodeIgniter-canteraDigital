<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;
class Libros extends Controller{
    public function index(){
        $libro = new Libro();
        $datos['libros'] = $libro->orderBy('id','ASC')->findAll();
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piePagina');
        return view('libros/listar', $datos);
    }
    public function crear(){
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piePagina');
        return view("libros/crear");
    }
    public function guardar(){
        $libro= new Libro();
        $validate=$this->validate([
            'nombre'=>'required|min_length[3]',
                'imagen'=>[
                    'uploaded[imagen]',
                    'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                    'max_size[imagen,1920]'
                ]
                ]);
                if(!$validate){
                    $session = session();
                    $session->setFlashdata('mensaje', 'Revise la información');
                    return redirect()->back()->withInput();
                    // return $this->response->redirect(site_url('/listar'));
                }
                if($imagen= $this->request->getFile('imagen')){
                    // $nuevoNombre= $imagen->getName(); //Imagen con nombre por defecto
                    $nuevoNombre= $imagen->getRandomName(); //Imagen con nombre random
                    $imagen->move('../public/uploads/',$nuevoNombre);
                    $datos=[
                        'nombre'=>$this->request->getVar('nombre'),
                        'imagen'=>$nuevoNombre
                    ];
                    $libro->insert($datos);
                }
        
            return $this->response->redirect(site_url('/listar'));
    }
     public function borrar($id=null){
        $libro= new Libro();
        $datoslibro = $libro->where('id',$id)->first();
        $ruta=('../public/uploads/'.$datoslibro['imagen']);
        unlink($ruta);
        $libro->where('id',$id)->delete($id);
        echo 'Borrado el registro #'.$id;
        return $this->response->redirect(site_url('/listar'));
    }
    public function editar($id=null){
         $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piePagina');
        $libro= new Libro();
        $datos['libro']=$libro->where('id',$id)->first();

        return view('libros/editar', $datos);
    }
    public function actualizar(){
        
        $libro= new Libro();
        $datos=[
                'nombre'=>$this->request->getVar('nombre'),
            ];
            $id=$this->request->getVar('id');
            $libro->update($id,$datos);
            $validate=$this->validate([
                'imagen'=>[
                    'uploaded[imagen]',
                    'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                    'max_size[imagen,1024]'
                ]
                ]);
            if($validate){
                if($imagen= $this->request->getFile('imagen')){
                    $datolibro=$libro->where('id',$id)->first();
                    $ruta=('../public/uploads/'.$datolibro['imagen']);
        unlink($ruta);
                        // $nuevoNombre= $imagen->getName(); //Imagen con nombre por defecto
                        $nuevoNombre= $imagen->getRandomName(); //Imagen con nombre random
                        $imagen->move('../public/uploads/',$nuevoNombre);
                        $datos=[
                            'imagen'=>$nuevoNombre
                        ];
                        $libro->update($id, $datos);
                }
            }
        return $this->response->redirect(site_url('/listar'));
    }
}