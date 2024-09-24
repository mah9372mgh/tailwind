<div class="author_profile_page" itemscope itemtype="http://schema.org/ProfilePage">
	<div class="author_profile" itemprop="about" itemscope itemtype="http://schema.org/Person">
		<div class="author_img res">
			<?php if (isset($author['avatar_id'])) : ?>
				<?php
				$file = new Manipulate_File_File();
				$primaryFileData = $file->getData($author['avatar_id'], array(
					'w' => 240,
					'h' => 240,
					'zc' => 1,
				));
				?>
				<img loading="lazy" itemprop="image" src="<?php echo $primaryFileData['picture']; ?>" width="240" height="240" alt="<?php echo h($author['authorFname'] . ' ' . $author['authorLname']); ?>">
			<?php else : ?>
				<img loading="lazy" src="/images/avatar.jpg" width="240" height="240" alt="<?php echo h($author['authorFname'] . ' ' . $author['authorLname']); ?>" itemprop="image">
			<?php endif; ?>
		</div>
		<div class="author_txt">
			<?php if (!empty($author['authorLead'])) : ?>
				<?php echo $author['authorLead']; ?>
			<?php endif; ?>
			<div class="profile_name">
				<span>
					<?php echo h($author['authorFname'] . ' ' . $author['authorLname']); ?>
				</span>
				<ul class="profile_list">
					<?php if (isset($author['types']['AUTHOR_TYPE_AUTHOR'])) : ?><li>مولف</li><?php endif; ?>
					<?php if (isset($author['types']['AUTHOR_TYPE_TRANSLATOR'])) : ?><li>مترجم</li><?php endif; ?>
					<?php if (isset($author['types']['AUTHOR_TYPE_PHOTOGRAPHER'])) : ?><li>عکاس</li><?php endif; ?>
					<?php if (isset($author['types']['AUTHOR_TYPE_JOURNALIST'])) : ?><li>خبرنگار</li><?php endif; ?>
					<?php if (isset($author['types']['AUTHOR_TYPE_WRITER'])) : ?><li>نویسنده</li><?php endif; ?>
				</ul>
				<?php if (AuthComponent::user('admin')) : ?>
					<div class="edit_author">
						<a href="/fa/admin/authors/edit/<?php echo $author['id']; ?>/" target="_blank" title="ویرایش مولف" rel="nofollow">ویرایش مولف</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php echo $this->element('profile/author_newsList'); ?>
</div>