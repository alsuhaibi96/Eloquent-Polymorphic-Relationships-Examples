<h1>Eloquent Polymorphic Relationships</h1>


<h3><a href="#oneToOne"> One to One Relationship: </a> </h3>
<p>
    A one-to-one polymorphic relation is similar to a typical one-to-one relation; For example, a blog Post and a User may share a polymorphic relation to an Image model. Using a one-to-one polymorphic relation allows you to have a single table of unique images that may be associated with posts and users. First, let's examine the table structure:
  </p>
  
  <h4>1. Table schemas</h4>
  <pre>
   Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
  </pre>
    
 <h4>Define the model definitions :</h4>
 <h4>In User Model :</h4>
    <pre> 
    use Illuminate\Database\Eloquent\Model;
   use Illuminate\Database\Eloquent\Relations\MorphOne;
    /**
     * Get the user's image
     */
    public function image():MorphOne
    {
   return $this->morphOne(Image::class,'imageable');
    }
     }
    </pre>
    <h4>In Post Model :</h4>
    <pre> 
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\MorphOne;
    /**
     * Get the post's image
     */
    public function image():MorphOne
    {
     return $this->morphOne(Image::class,'imageable');
    }
     }
    </pre>
    <h4>In Image Model :</h4>
    <pre> 
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\MorphTo;
    /**
     * Get the parent imageable model (user or post)
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
    </pre>
   <h4>In  the the controllers you can retrieve the image this way  :</h4>
    <pre> 
     public function showPostImage()
    {
     $post =Post::find(1);
     $image=$post->image;
     return $image;
    }
    public function showUserImage()
    {
        $user= User::find(1);
        $image=$user->image;
        return $image;
    }
    </pre> 
