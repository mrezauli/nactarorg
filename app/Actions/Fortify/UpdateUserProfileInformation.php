<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'name_in_bangla' => ['required', 'string', 'max:50'],
            'name_of_father' => ['required', 'string', 'max:50'],
            'name_of_father_in_bangla' => ['required', 'string', 'max:50'],
            'name_of_mother' => ['required', 'string', 'max:50'],
            'name_of_mother_in_bangla' => ['required', 'string', 'max:50'],
            'contact' => ['required', 'numeric', 'between:100000000,999999999'],
            'date_of_birth' => ['required', 'date'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'national_id' => ['required', 'numeric', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'name_in_bangla' => $input['name_in_bangla'],
                'name_of_father' => $input['name_of_father'],
                'name_of_father_in_bangla' => $input['name_of_father_in_bangla'],
                'name_of_mother' => $input['name_of_mother'],
                'name_of_mother_in_bangla' => $input['name_of_mother_in_bangla'],
                'contact' => $input['contact'],
                'date_of_birth' => $input['date_of_birth'],
                'email' => $input['email'],
                'national_id' => $input['national_id'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
