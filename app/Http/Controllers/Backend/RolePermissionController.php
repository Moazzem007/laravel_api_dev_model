<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    protected $roleRepository;
    protected $permissionRepository;
    protected $userRepository;

    public function __construct(RoleRepositoryInterface $roleRepository, PermissionRepositoryInterface $permissionRepository, UserRepositoryInterface $userRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        $roles = $this->roleRepository->getAllRoles();
        $permissions = $this->permissionRepository->getAllPermissions();
        $users = $this->userRepository->getAllUsers();
        return view('backendDashboard.rolePermissionManagement.index', compact('roles', 'permissions', 'users'));
    }


    public function getUserRoles(Request $request)
    {
        $userRoles = $this->userRepository->getUserRoles($request->ID);
        return response()->json($userRoles);
    }


    // Assign a role to a user
    public function assignRole(Request $request)
    {
        // return response()->json($request->all());
        // Validate the role input
        $validated = $request->validate([
            'role' => 'required|string|exists:roles,name',  // Validate that the role exists
        ]);

        // Find the user by ID
        $user = User::find($request->userId);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Find the role
        $role = Role::where('name', $validated['role'])->first();

        // Check if the role exists
        if (!$role) {
            return response()->json(['message' => 'Role not found.'], 404);
        }

        // Assign the role to the user
        
        if($request->status == 'true'){
            $user->assignRole($role);
            return response()->json(['message' => 'Role assigned successfully.'], 200);
        }else{
            $user->revokeRole($role);
            return response()->json(['message' => 'Role revoked successfully.'], 200);
        }
        

        // Return success response
        return response()->json(['message' => 'Role assigned successfully.'], 200);
    }
}
