public function up(): void
{
    Schema::create('perangkat_desa', function (Blueprint $table) {
        $table->id();
        $table->foreignId('warga_id')->constrained('warga')->onDelete('cascade');
        $table->string('jabatan');
        $table->string('kontak')->nullable();
        $table->date('periode_mulai')->nullable();
        $table->date('periode_selesai')->nullable();
        $table->timestamps();
    });
}
