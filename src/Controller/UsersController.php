<?php
declare(strict_types=1);

namespace App\Controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario registrado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no pudo ser registrado, intenta de nuevo'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario editado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no ha podido ser editado, intenta de nuevo'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuario eliminado'));
        } else {
            $this->Flash->error(__('El usuario no ha sido eliminado, intenta de nuevo'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()

    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            return $this->redirect(['controller' => 'Users','action' => 'index']);
        }
        if ($this->request->is('post')) {
            $this->Flash->error('Correo o contraseña equivocada');
        }

    }
    public function logout()

    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);

        }

    }

    public function downloadExcel()
    {
        $users = $this->Users->find('all');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Nombre')
            ->setCellValue('C1', 'Apellido')
            ->setCellValue('D1', 'Equipo')
            ->setCellValue('E1', 'Edad')
            ->setCellValue('F1', 'Email');

        $row = 2;
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user->id)
                ->setCellValue('B' . $row, $user->nombre)
                ->setCellValue('C' . $row, $user->apellido)
                ->setCellValue('D' . $row, $user->equipo)
                ->setCellValue('E' . $row, $user->edad)
                ->setCellValue('F' . $row, $user->email);
            $row++;
        }

        $filename = 'Datos de usuario.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        $this->autoRender = false;
    }

    public function downloadTxt()
    {
        $users = $this->Users->find('all');
        $content = '';
        foreach ($users as $user) {
            $content .= "ID: {$user->id}, Nombre: {$user->nombre}, Apellido: {$user->apellido}, Equipo: {$user->equipo}, Edad: {$user->edad}, Email: {$user->email}\n";
        }

        $filename = 'Datos de usuario.txt';
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        echo $content;
        $this->autoRender = false;
    }
}
