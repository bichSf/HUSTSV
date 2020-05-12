<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AvatarValidateRule implements Rule
{
    /**
     * Message return
     *
     * @var
     */
    private $message;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!is_file($value)) {
            return true;
        }
        if ($value->getSize() > MAX_SIZE_AVATAR) {
            $this->message = 'Dung lượng ảnh vượt quá 5MB';
            return false;
        }
        if (!in_array($value->extension(), EXTENSION_IMAGE)) {
            $this->message = 'Định dạng hình ảnh được phép là jpg hoặc png.';
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
