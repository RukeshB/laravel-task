<?php
    namespace App\Service;

    use App\User;
     class UserService
     {
         protected $user = "users";

          public function __construct(Customer $user)
        {
            $this->user = $user;
        }

        public function getById($id)
        {
            return $this->user->find($id);
        }


        public function getAll()
        {
            return $this->user->get();
        }


        public function store($request)
        {
           try{
            if($request->hasfile('photo'))
                {
                    $file = $request->file('photo');
                    $extension = $file->getClientOriginalExtension(); //get image extension
                    $filename = time().'.'.$extension;
                    $file->move('uploads/image/avater/',$filename);
                    $this->user->image = 'uploads/image/avater/'.$filename;
                }

                //dd($request);

                $this->user->name = request('name');
                $this->user->dob = request('dob');
                $this->user->gender = request('gender');
                $this->user->loctaion_id = request('location_id');
                $this->user->role = 'user';
                $this->user->email = request('email');
                $this->user->password= Hash::make(\request('password'));
                $this->user->save();
                }
                    catch(Exception $ex)
                    {
                        throw $ex;
                    }



                }
     }
?>
