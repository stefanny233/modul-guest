public function up(): void
{
    Schema::create('warga', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nik')->unique();
        $table->string('alamat');
        $table->timestamps();
    });
}
