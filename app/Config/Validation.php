<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];
	public $kategori = [
        'name'     => 'required',
        'status'     => 'required'
    ];
     
    public $kategori_errors = [
        'name' => [
            'required'    => 'Nama wajib diisi.',
        ],
        'status'    => [
            'required' => 'Status wajib diisi.'
        ]
	];
	public $matakuliah = [
		'ktg_id'           => 'required',
		'kode_matakuliah'          => 'required',
		'semester'         => 'required',
		'sks'           => 'required',
		'prodi'           => 'required',
		'status'        => 'required',
		'image'         => 'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]|max_size[image,1000]',
		'description'   => 'required'
	];
	 
	public $matakuliah_errors = [
		'ktg_id'   => [
			'required'  => 'Nama Kategori wajib diisi.',
		],
		'kode_matakuliah'  => [
			'required'  => 'Kode Matakuliah wajib diisi.'
		],
		'semester' => [
			'required'  => 'Semester wajib diisi.'
		],
		'sks'   => [
			'required'  => 'sks wajib diisi.'
		],
		'status'=> [
			'required'  => 'Status wajib diisi.'
		],
		'image'=> [
			'mime_in'   => 'Gambar hanya boleh diisi dengan jpg, jpeg, png atau gif.',
			'max_size'  => 'Gambar maksimal 1mb',
			'uploaded'  => 'Gambar wajib diisi'
		],
		'description'   => [
			'required'          => 'Description wajib diisi.'
		]
	];
	public $mahasiswa = [
        'npm'     => 'required',
        'nama_mahasiswa'     => 'required'
    ];
     
    public $mahasiswa_errors = [
        'npm' => [
            'required'    => 'NPM wajib diisi.',
        ],
        'nama_mahasiswa'    => [
            'required' => 'Nama Mahasiswa wajib diisi.'
        ]
	];
	public $kuis = [
		'ktg_id'           => 'required',
		'kode_matakuliah'          => 'required',
		'semester'         => 'required',
		'sks'           => 'required',
		'prodi'           => 'required',
		'status'        => 'required',
		'image'         => 'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]|max_size[image,1000]',
		'description'   => 'required'
	];
	 
	public $kuis_errors = [
		'ktg_id'   => [
			'required'  => 'Nama Kategori wajib diisi.',
		],
		'kode_matakuliah'  => [
			'required'  => 'Kode Matakuliah wajib diisi.'
		],
		'semester' => [
			'required'  => 'Semester wajib diisi.'
		],
		'sks'   => [
			'required'  => 'sks wajib diisi.'
		],
		'status'=> [
			'required'  => 'Status wajib diisi.'
		],
		'image'=> [
			'mime_in'   => 'Gambar hanya boleh diisi dengan jpg, jpeg, png atau gif.',
			'max_size'  => 'Gambar maksimal 1mb',
			'uploaded'  => 'Gambar wajib diisi'
		],
		'description'   => [
			'required'          => 'Description wajib diisi.'
		]
	];
	public $authlogin = [
		'email'         => 'required|valid_email',
		'password'      => 'required'
	];
	 
	public $authlogin_errors = [
		'email'=> [
			'required'  => 'Email wajib diisi.',
			'valid_email'   => 'Email tidak valid'
		],
		'password'=> [
			'required'  => 'Password wajib diisi.'
		]
	];
	 
	public $authregister = [
		'email'             => 'required|valid_email|is_unique[users.email]',
		'username'          => 'required|alpha_numeric|is_unique[users.username]|min_length[8]|max_length[35]',
		'name'              => 'required|alpha_numeric_space|min_length[3]|max_length[35]',
		'password'          => 'required|string|min_length[8]|max_length[35]',
		'confirm_password'  => 'required|string|matches[password]|min_length[8]|max_length[35]',
	];
	 
	public $authregister_errors = [
		'email'=> [
			'required'      => 'Email wajib diisi',
			'valid_email'   => 'Email tidak valid',
			'is_unique'     => 'Email sudah terdaftar'
		],
		'username'=> [
			'required'      => 'Username wajib diisi',
			'alpha_numeric' => 'Username hanya boleh berisi huruf dan angka',
			'is_unique'     => 'Username sudah terdaftar',
			'min_length'    => 'Username minimal 3 karakter',
			'max_length'    => 'Username maksimal 35 karakter'
		],
		'name'=> [
			'required'              => 'Name wajib diisi',
			'alpha_numeric_spaces'  => 'Name hanya boleh berisi huruf, angka dan spasi',
			'min_length'            => 'Name minimal 3 karakter',
			'max_length'            => 'Name maksimal 35 karakter'
		],
		'password'=> [
			'required'      => 'Password wajib diisi',
			'string'        => 'Password hanya boleh berisi huruf, angka, spasi dan karakter lain',
			'min_length'    => 'Password minimal 8 karakter',
			'max_length'    => 'Password maksimal 35 karakter'
		],
		'confirm_password'=> [
			'required'      => 'Konfirmasi password wajib diisi',
			'string'        => 'Konfirmasi password hanya boleh berisi huruf, angka, spasi dan karakter lain',
			'matches'       => 'Konfirmasi password tidak sama dengan password',
			'min_length'    => 'Konfirmasi password minimal 8 karakter',
			'max_length'    => 'Konfirmasi password maksimal 35 karakter'
		]
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
